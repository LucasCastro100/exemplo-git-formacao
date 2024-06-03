<?php

namespace App\Http\Controllers\Caixeta\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypePage;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashBoardController extends Controller
{
    public static function getURL(){
        $url = url()->current();
        $url = explode('/', $url);
        $url = $url[count($url) - 1];

        $titlePage = TypePage::where('page', $url)->first();

       return $titlePage->title;
    }

    public function index(Request $request)
    {
        $typePage = TypePage::find(Auth::user()->type_page_id);

        $users = User::count();
        $check = User::where('permission_id', '<>', 1)->where('last_login', '<>', null)->orderBy('last_login', 'desc')->first();

        $newCheck = '---';

        if($check){
            $checkName = $check->name;
            $checkLastLogin = (new DateTime($check->last_login))->format('d/m');
            $newCheck = $checkName." - ".$checkLastLogin;
        }

        $publicPath = public_path('assets/files');
        $directories = array_filter(scandir($publicPath), function ($item) use ($publicPath) {
            return is_dir($publicPath . '/' . $item) && !in_array($item, ['.', '..']);
        });

        $countDirectories = count($directories);

        $dados = [];
        $dados['titlePage'] = 'Caixeta Dashboard';
        $dados['idPage'] = 'dashboard';
        $dados['dataUser'] = ['user' => Auth::user(), 'page' => $typePage->page];
        $dados['listInfo'] = ['users' => $users, 'files' => $countDirectories, 'check' => $newCheck];
        $dados['title'] = $this->getURL();

        if ($typePage->page != 'dashboard') {
            return redirect()->route('admin.service', ['url' => $typePage->page]);
        } else {
            return view('projects.caixeta.admin.dashboard', $dados);
        }
    }

    public function store(Request $request)
    {
        $base = $request->baseTable;
        $file = $request->file('fileTable');
        $newFileName = $base . '_table.xls';

        if ($base != '' && $file != '') {
            if (File::exists('assets/files/' . $base)) {
                File::deleteDirectory('assets/files/' . $base);
            }

            if ($file->move(public_path('assets/files/' . $base . '/'), $newFileName)) {
                session()->flash('success', 'Upload realizado com sucesso!');
                return redirect()->route('dashBoard.index');
            } else {
                session()->flash('error', 'Erro ao enviar o arquivo.');
                return redirect()->back();
            }
        } else {
            session()->flash('error', 'Os campos são obrigatórios!');
            return redirect()->back();
        }
    }

    public function service(string $data)
    {
        $typePage = TypePage::find(Auth::user()->type_page_id);

        $dados = [];
        $dados['titlePage'] = 'Caixeta Dashboard';
        $dados['idPage'] = 'dashboard';
        $dados['show'] = (Auth::user()->permission_id == 1 || $typePage->page == $data) ? true : false;
        $dados['page'] = $data;
        $dados['title'] = $this->getURL();
        $dados['filters'] = ['perPage' => [5, 10, 25, 50]];


        return view('projects.caixeta.admin.service', $dados);
    }
}
