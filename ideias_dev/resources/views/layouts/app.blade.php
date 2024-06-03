<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="application/javascript; charset=utf-8">

    {{-- <meta property="og:title" content="CAP | Patrocínio - Minas Gerais" />
    <meta property="og:image" content="https://ideias.dev.br/caixeta/assets/img/favicon.jpg" />
    <meta property="og:description" content="CAP - Caixeta Auto Peças | 34 3832-7001" />

    <meta name="robots" content="index,follow">
    <meta name="description" content="CAP - Caixeta Auto Peças | 34 3832-7001">
    <meta name="keywords"
        content="peças, automoveis, carro, caminhão, caminhonete, acessórios, patrocínio, minas gerais, retrovisor, filtro de ar, filtro de oleo, placas"> --}}

    {{-- ICON --}}
    <script src="https://kit.fontawesome.com/5ae086a3a0.js" crossorigin="anonymous"></script>

    {{--  FONT --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet"
        href="https://fonts.bunny.net/css?family=figtree:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" />

    {{-- CSS --}}
    @yield('css')

    {{-- JS --}}
    @yield('js')

    {{-- FAVICON --}}
    @yield('favicon')

    {{-- TITLE --}}
    <title>@yield('titlePage')</title>
</head>

<body id="@yield('idPage')">
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- FIM - Facebook -->
    @yield('header')

    <main>
        @yield('main')
    </main>

    @yield('footer')
</body>

</html>
