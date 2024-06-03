<?php

namespace App\Http\Controllers\Ideias;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $dados = [];
        $dados['title'] = '';
        $dados['classPage'] = '';

        return view('projects.ideias.home', $dados);
    }
}
