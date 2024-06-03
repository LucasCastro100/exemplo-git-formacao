@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/caixeta/style.css') }}">
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
@endsection

@section('main')
    <section>
        <div class="container">
            <div class="row">
                <form action="{{ route('admin.storeLogin') }}" method="post" class="col-12">
                    @csrf

                    @if ($errors->has('error'))
                            <div class="alert alert-erro col-12">
                                @foreach ($errors->get('error') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif

                    <div class="form-group col-12">
                        <label>E-mail</label>
                        <input type="text" name="email" class="form-item" value="admin@gmail.com">
                        @if ($errors->has('email'))
                            <div class="alert alert-erro col-12">
                                @foreach ($errors->get('email') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-12">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-item" value="admin123">
                        @if ($errors->has('password'))
                            <div class="alert alert-erro col-12">
                                @foreach ($errors->get('password') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-12">
                        <input type="submit" name="accessUser" value="Acessar" class="btn click">
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
