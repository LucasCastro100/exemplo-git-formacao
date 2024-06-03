@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/games/rgb.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/games/rgb.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/ideias/favicon.png') }}" />
@endsection

@section('main')
    <section id="info-colors" class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-12">
                        <h1 class="bold text-center title">RGB</h1>
                    </div>

                    <div class="col-lg-4 col-12 colors">
                        <div class="color-title">
                            <p>R (0)</p>
                        </div>

                        <div class="color-config">
                            <span>0</span>
                            <input type="range" data-color="R" name="colorRed" id="range" min="0"
                                max="255" step="1" value="0">
                            <span>255</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 colors">
                        <div class="color-title">
                            <p>G (0)</p>
                        </div>

                        <div class="color-config">
                            <span>0</span>
                            <input type="range" data-color="G" name="colorGreen" id="range" min="0"
                                max="255" step="1" value="0">
                            <span>255</span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-12 colors">
                        <div class="color-title">
                            <p>B (0)</p>
                        </div>

                        <div class="color-config">
                            <span>0</span>
                            <input type="range" data-color="B" name="colorBlue" id="range" min="0"
                                max="255" step="1" value="0">
                            <span>255</span>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-center align-center action">
                        <button class="click">Gerar</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 area-color">
            </div>
        </div>
    </section>
@endsection
