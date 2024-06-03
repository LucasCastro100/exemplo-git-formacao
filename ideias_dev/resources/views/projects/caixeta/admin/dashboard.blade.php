@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/caixeta/style.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/caixeta/readXLS.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
@endsection

@section('header')
    @include(' includes.caixeta.admin.header')
@endsection

@section('main')
    @if ($dataUser['user']->permission_id == 1)
        @if (session('success'))
            <div class="alert alert-success col-12">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-erro col-12">
                {{ session('error') }}
            </div>
        @endif

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="bold text-center title">{{ $title }}</h2>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="bold">Informações</h2>
                    </div>

                    <x-caixeta.listInfoDashboard typeInfo="user" titleInfo="Usuários" icon="user" infoList="{{ $listInfo['users'] }}" />
                    <x-caixeta.listInfoDashboard typeInfo="file" titleInfo="Arquivos" icon="file-excel" infoList="{{ $listInfo['files'] }}" />
                    <x-caixeta.listInfoDashboard typeInfo="login" titleInfo="Último Acesso" icon="power-off" infoList="{{ $listInfo['check'] }}" />
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="bold">Cadastrar Tabela</h2>
                    </div>

                    @include('includes.caixeta.admin.addTableServer')
                </div>
            </div>
        </section>
    @else
        @include('includes.caixeta.admin.notPermission')
    @endif
@endsection
