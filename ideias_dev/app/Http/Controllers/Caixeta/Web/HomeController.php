<?php

namespace App\Http\Controllers\Caixeta\Web;

use App\Http\Controllers\Controller;
use App\Models\Caixeta\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dados = [];
        $dados['titlePage'] = 'CAP - Caixeta Auto Peças';
        $dados['idPage'] = 'web';
        $dados['categories'] = Category::listCategories();

        return view('projects.caixeta.web.home', $dados);
    }
}
