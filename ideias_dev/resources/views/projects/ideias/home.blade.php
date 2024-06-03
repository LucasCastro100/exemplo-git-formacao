@extends('layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('idPage')
    {{ $idPage }}
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12"><h1>Dashboard</h1></div>
            </div>
        </div>
    </section>
@endsection
