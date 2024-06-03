@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/matematicabkp.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/matematicaBKP.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section id="list-result">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-direction-row justify-center align-center gap info-list-result">
                    <h3 class="bold success m-0">Acertos: 0</h3>
                    <h3 class="bold m-0">|</h3>
                    <h3 class="bold error m-0">Erros: 0</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="operations">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="d-flex flex-direction-row justify-center align-center gap">
                        <li data-operation="+" class="active">
                            <p class="bold"><i class="fa-solid fa-plus"></i>
                        </li>
                        <li data-operation="-">
                            <p class="bold"><i class="fa-solid fa-minus"></i></p>
                        </li>
                        <li data-operation="x">
                            <p class="bold"><i class="fa-solid fa-xmark"></i></p>
                        </li>
                        <li data-operation="/">
                            <p class="bold"><i class="fa-solid fa-divide"></i></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="values">
        <div class="container">
            <div class="row"></div>
        </div>
    </section> --}}

    <section id="btns">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-direction-row justify-center align-center gap">
                    <button class="btn" data-btn="generate">
                        <p>Gerar</p>
                    </button>

                    <button class="btn" data-btn="check">
                        <p>Verificar</p>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section id="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-11 col-12 p-0">
                    <div class="row">
                        <div class="form-group col-lg-4 col-sm-6 col-12">
                            <label for="">Operação</label>
                            <select name="selectOperation" class="form-item" data-input="filter">
                                <option value="all" selected>Todas</option>
                                <option value="0">Soma</option>
                                <option value="1">Subtração</option>
                                <option value="2">Multiplicação</option>
                                <option value="3">Divisão</option>
                            </select>
                        </div>
        
                        <div class="form-group col-lg-4 col-sm-6 col-12">
                            <label for="">Resultado</label>
                            <select name="resultOperation" class="form-item" data-input="filter">
                                <option value="all" selected>Todas</option>
                                <option value="success">Corretas</option>
                                <option value="error">Erradas</option>
                            </select>
                        </div>
        
                        <div class="form-group col-lg-4 col-sm-6 col-12">
                            <label for="">Data</label>
                            <input type="date" name="dateOperation" class="form-item" value="" min=""
                                max="" data-input="filter">
                        </div>
                    </div>
                </div>
                

                <div class="form-group col-lg-1 col-sm-6 col-12 d-flex justify-center align-center">
                        <button class="btn w-100 h-100" data-btn="search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>

                <div class="col-12 showResults">
                    <h4 class="bold"></h4>

                    <ul class="listResults row">

                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
