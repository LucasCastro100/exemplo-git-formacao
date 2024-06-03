@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/beercode/style.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/beercode/script.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('header')
    <header>
        <div class="container">
            <nav>
                <ul class="d-grid">
                    <li class="li1">
                        <h1>Item 1</h1>
                    </li>
                    <li class="li2">
                        <h1>Item 2</h1>
                    </li>
                    <li class="li3">
                        <h1>Item 3</h1>
                    </li>
                    <li class="li4">
                        <h1>Item 4</h1>
                    </li>
                    <li class="li5">
                        <h1>Item 5</h1>
                    </li>
                </ul>
            </nav>
        </div>        
    </header>
@endsection

@section('main')
    <section>
    </section>
@endsection
