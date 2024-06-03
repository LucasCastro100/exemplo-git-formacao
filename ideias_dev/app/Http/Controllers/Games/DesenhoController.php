<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DesenhoController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'Desenho - Ideias Dev';
        $dados['idPage'] = 'desenho';

        return view('projects.games.desenho', $dados);
    }
}
