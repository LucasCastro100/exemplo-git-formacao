@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/desenho.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/desenho.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section class="container">
        <div class="row">
            <div class="col-12 info-screen">
                <canvas id="tela" width="0" height="0"></canvas>
            </div>

            <div class="col-12 d-flex info-color">
                <?php foreach($listColors as $key => $colors){?>
                    <div data-color="<?php echo $colors?>" style="background-color: <?php echo $colors?>" class="color <?php if($key == 0){ echo 'active';}?>"></div>
                <?php }?>
            </div>

            <div class="col-md-4 col-12 d-flex align-center justify-center column-gap hide">
                <button class="btn bold" data-btn="color_full" title="Desenhar"><i class="fa-solid fa-pencil fa-lg"></i></button>
                <button class="btn bold" data-btn="color_full" title="Colorir o Quadro"><i class="fa-solid fa-fill-drip fa-lg"></i></button>
                <button class="btn bold" data-btn="clear" title="Limpar Quadro"><i class="fa-regular fa-note-sticky fa-lg"></i></button>
                <button class="btn bold" data-btn="dowload" title="Baixar Imagem"><i class="fa-sharp fa-solid fa-download fa-lg"></i></button>
            </div>
        </div>
    </section>
@endsection
