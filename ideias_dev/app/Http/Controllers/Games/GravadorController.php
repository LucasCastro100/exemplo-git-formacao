<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GravadorController extends Controller
{
    

    public function img(){
        $dados = [];
        $dados['titlePage'] = 'Gravador IMG - Ideias Dev';
        $dados['idPage'] = 'gravador';

        return view('projects.games.gravadorImg', $dados);
    }

    public function tela(){
        $dados = [];
        $dados['titlePage'] = 'Gravador Tela';
        $dados['idPage'] = 'gravador';

        return view('projects.games.gravadorTela', $dados);
    }

    public function voz(){
        $dados = [];
        $dados['titlePage'] = 'Gravador VOZ';
        $dados['idPage'] = 'gravador';

        return view('projects.games.gravadorVoz', $dados);
    }
}
