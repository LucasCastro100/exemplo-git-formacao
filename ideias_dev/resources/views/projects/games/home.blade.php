@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/home.css') }}">
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
            <div class="row">
                <div class="col-12">
                    <h1 class="bold text-center">Ideias.dev</h1>
                    <h3 class="bold text-center">Alguns Projetos</h3>
                </div>
            </div>

            <div class="row">
                <?php foreach($list as $key => $dados){?>
                <div class="col-xl-3 col-lg-4 col-12 ideias">
                    <div class="info-ideias">
                        <div class="info-ideias-title">
                            <h3 class="bold"><?php echo $dados['name']; ?></h3>
                        </div>
                        <div class="info-ideias-desc">
                            <p><?php echo $dados['desc']; ?></p>
                        </div>
                        <div class="info-ideias-btn d-flex justify-end align-center"><a href="<?php echo $dados['url']; ?>"
                                class="bold">Acessar</a></div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
@endsection
