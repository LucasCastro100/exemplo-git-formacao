<?php

namespace App\Http\Controllers\BeerCode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $dados = [];
        $dados['titlePage'] = 'Beer Code';
        $dados['idPage'] = 'web';

        return view('projects.beercode.home', $dados);
    }
}

