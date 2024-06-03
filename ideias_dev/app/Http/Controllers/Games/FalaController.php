<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FalaController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'Fala - Ideias Dev';
        $dados['idPage'] = 'fala';

        return view('projects.games.fala', $dados);
    }
}
