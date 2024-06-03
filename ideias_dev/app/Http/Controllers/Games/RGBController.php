<?php

namespace App\Http\Controllers\Games;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RGBController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'RGB - Ideias Dev';
        $dados['idPage'] = 'rgb';

        return view('projects.games.rgb', $dados);
    }
}
