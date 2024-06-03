@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/matematica.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/matematicaBKP.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="result">
        <div class="container">
            <div class="row justify-center align-center column-gap">
                <div class="bold success">Acertos: 0</div>
                <div class="bold">|</div>
                <div class="bold error">Erros: 0</div>
            </div>
        </div>
    </section>

    <section class="operation">
        <div class="container">
            <div class="row justify-center align-center column-gap">
                <div data-operation="+" class="active">
                    <p class="bold"><i class="fa-solid fa-plus"></i></p>
                </div>

                <div data-operation="-">
                    <p class="bold"><i class="fa-solid fa-minus"></i></p>
                </div>

                <div data-operation="x">
                    <p class="bold"><i class="fa-solid fa-xmark"></i></p>
                </div>

                <div data-operation="/">
                    <p class="bold"><i class="fa-solid fa-divide"></i></p>
                </div>
            </div>
        </div>
    </section>

    <section class="calc">
        <div class="container">
            <div class="row justify-center align-center">
                <div class="info-calc d-flex flex-direction-column" data-calc="style-number"><input type="number"
                        data-number-input="0" min="1" max="9999" value="10"><input type="text"
                        data-calc="value" value="" readonly></div>
                <div class="info-calc" data-calc="style-symbol">
                    <p data-calc="symbol" data-value="+">+</p>
                </div>
                <div class="info-calc d-flex flex-direction-column" data-calc="style-number"><input type="number"
                        data-number-input="1" min="1" max="9999" value="10"><input type="text"
                        data-calc="value" value="" readonly></div>
                <div class="info-calc" data-calc="style-symbol">
                    <p>=</p>
                </div>
                <div class="info-calc" data-calc="style-number"><input type="text" data-calc="result" value=""
                        onkeyup="deleteCaracter(event)"></div>
            </div>
        </div>
    </section>

    <section class="check">
        <div class="container">
            <div class="row justify-center align-center column-gap">
                <button class="btn" data-btn="generate">
                    <p>Gerar</p>
                </button>
                <button class="btn" data-btn="check">
                    <p>Verificar</p>
                </button>
            </div>
        </div>
    </section>

    <section class="list">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form data-form="filterResult">
                        <div class="row">
                            <div class="form-group col-md-3 col-6">
                                <label for="">Operação</label>
                                <select name="selectOperation" class="form-item">
                                    <option value="all" selected>Todas</option>
                                    <option value="0">Soma</option>
                                    <option value="1">Subtração</option>
                                    <option value="2">Multiplicação</option>
                                    <option value="3">Divisão</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3 col-6">
                                <label for="">Resultado</label>
                                <select name="resultOperation" class="form-item">
                                    <option value="all" selected>Todas</option>
                                    <option value="success">Corretas</option>
                                    <option value="error">Erradas</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3 col-6">
                                <label for="">Data</label>
                                <input type="date" name="dateOperation" class="form-item" value="" min=""
                                    max="">
                            </div>

                            <div class="form-group col-md-3 col-6 d-flex justify-end">
                                <div class="d-flex justify-end align-center">
                                    <button class="btn" onclick="getDadosFormFilter(event)">Pesquisar</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
