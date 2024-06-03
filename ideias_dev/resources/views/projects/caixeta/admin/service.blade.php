@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/caixeta/style.css') }}">
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
    <script type="module" src="{{ asset('/assets/js/projects/caixeta/readXLS.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
@endsection

@section('header')
    @include('includes.caixeta.admin.header')
@endsection

@section('main')
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
                @if ($show)
                    <div class="col-12 filters p-0">
                        <div class="row ">
                            <x-caixeta.itemFilterServiceSelect class="col-lg-2 col-sm-6 col-12" labelNameId="perPage"
                                title="QTD. PÁGINA" :options="$filters['perPage']" />
                            <x-caixeta.itemFilterServiceDataList class="col-lg-3 col-sm-6 col-12" labelNameId="codFab"
                                title="PRODUTO" dataList="listProduct" />
                            <x-caixeta.itemFilterServiceInput class="col-lg-4 col-sm-6 col-12" labelNameId="desc"
                                title="DESCRIÇÃO" dataType="text" />

                            @if ($page != 'cap')
                                <x-caixeta.itemFilterServiceDataList class="col-lg-3 col-sm-6 col-12" labelNameId="familia"
                                    title="FAMÍLIA" dataList="listFamilias" />
                            @else
                                <x-caixeta.itemFilterServiceDataList class="col-lg-3 col-sm-6 col-12" labelNameId="marca"
                                    title="MARCA" dataList="listMarcas" />
                            @endif

                            <x-caixeta.itemFilterServiceBtn />
                        </div>
                    </div>

                    @include('includes.caixeta.admin.table')
                @else
                    @include('includes.caixeta.admin.notPermission')
                @endif
            </div>
        </div>
    </section>
@endsection
