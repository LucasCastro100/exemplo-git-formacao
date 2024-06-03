@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/gravador.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/gravadorTela.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="container">
        <div class="row">

            <div class="col-12">
                <video id="video" class="w-100" autoplay></video>
            </div>

            <div class="col-12">
                <button id="start-recording-btn">Iniciar Gravação</button>
                <button id="stop-recording-btn" disabled>Parar Gravação</button>
                <button id="save-video-btn" disabled>Salvar Vídeo</button>
            </div>
        </div>
    </section>
@endsection
