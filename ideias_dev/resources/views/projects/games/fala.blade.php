@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/fala.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/fala.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="bold text-center string">Teste</h1>
            </div>

            <div class="col-12 controls">
                <button btn-event="start" title="Iniciar Gravação"><i class="fa-solid fa-microphone"></i></button>
                <button btn-event="stop" title="Pausar Gravação"><i class="fa-solid fa-microphone-slash"></i></button>
                <button btn-event="check" title="Verificar Gravação"><i class="fa-solid fa-check"></i></button>
                <!--<button btn-event="dowload" title="Baixar Gravação"><i class="fa-solid fa-download"></i></button>-->
            </div>

            <div class="col-12">
                <div class="output text-center"></div>
            </div>

            <div class="col-12">
                <div class="response text-center"></div>
            </div>
        </div>
    </section>
@endsection
