<?php

namespace App\Http\Controllers\Caixeta\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
    }

    public function login()
    {
        $dados = [];
        $dados['titlePage'] = 'Caixeta Login';
        $dados['idPage'] = 'login';

        return view('projects.caixeta.admin.login', $dados);
    }

    public function storeLogin(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ], [
            'email.required' => 'E-mail é obrigatório!',
            'email.email' => 'E-mail inválido!',
            'password.required' => 'Senha é obrigatória!',
            'password.min' => 'Senha deve possuir no minimo :min caracteres!'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $checkLog = User::find(Auth::user()->id)->update(['last_login' => Carbon::now()]);
            if ($checkLog) {
                return redirect()->route('dashBoard.index');
            } else {
                return redirect()->route('login')->with('error', 'Ops, algo deu errado. Tente novamente!');
            }
        } else {
            return redirect()->route('login')->with('error', 'E-mail ou Senha inválidos!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
