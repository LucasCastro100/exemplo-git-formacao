<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CobrinhaController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'Cobrinha - Ideias Dev';
        $dados['idPage'] = 'cobrinha';

        return view('projects.games.cobrinha', $dados);
    }
}
