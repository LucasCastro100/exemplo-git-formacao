@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/gravador.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/gravadorVoz.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="container">
        <div class="row">

            <div class="col-12 controls">
                <button id="start-record-btn"><i class="fa-solid fa-microphone"></i></button>
                <button id="stop-record-btn" disabled><i class="fa-solid fa-microphone-slash"></i></button>
                <button id="save-text-btn" disabled><i class="fa-solid fa-download"></i></button>
            </div>

            <div class="col-12">
                <div id="recorded-text" class="w-100"></div>
            </div>
        </div>
    </section>
@endsection
