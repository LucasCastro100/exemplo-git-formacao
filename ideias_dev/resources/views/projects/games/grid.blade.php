@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/grid.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/home.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section>
        <div class="container">
            <div class="grid">
                <div class="info-grid grid1"></div>
                <div class="info-grid grid2"></div>
                <div class="info-grid grid3"></div>
                <div class="info-grid grid4"></div>
                <div class="info-grid grid5"></div>
                <div class="info-grid grid6"></div>
                <div class="info-grid grid7"></div>
                <div class="info-grid grid8"></div>
                <div class="info-grid grid9"></div>
                <div class="info-grid grid10"></div>
                <div class="info-grid grid11"></div>
                <div class="info-grid grid12"></div>
                <div class="info-grid grid13"></div>
            </div>
        </div>
    </section>
@endsection
