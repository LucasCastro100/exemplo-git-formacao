<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use App\Models\Games\IdeiaDev;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dados = [];
        $dados['titlePage'] = 'Home - Ideias Dev';
        $dados['idPage'] = 'home';
        $dados['list'] = IdeiaDev::$vectorMenuIdeias;

        return view('projects.games.home', $dados);
    }

    public function grid()
    {
        $dados = [];
        $dados['titlePage'] = 'Grid';
        $dados['idPage'] = 'home';

        return view('projects.games.grid', $dados);
    }
}
