@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/cobrinha.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/cobrinha.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="info-game">
                    <div class="game-details d-flex justify-between">
                        <span class="bold score">Pontos: 0</span>
                        <span class="bold high-score">Maior Pontuação: 0</span>
                    </div>

                    <div class="play-board"></div>

                    <div class="controls">
                        <i data-key="65" class="fa-solid fa-arrow-left-long"></i>
                        <i data-key="87" class="fa-solid fa-arrow-up-long"></i>
                        <i data-key="68" class="fa-solid fa-arrow-right-long"></i>
                        <i data-key="83" class="fa-solid fa-arrow-down-long"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
