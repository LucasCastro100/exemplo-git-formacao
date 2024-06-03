<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MatematicaController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'Matematica - Ideias Dev';
        $dados['idPage'] = 'matematica';

        return view('projects.games.matematicabkp', $dados);
    }
}
