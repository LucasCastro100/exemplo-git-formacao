@extends('layouts.app')

@section('titlePage', $titlePage)
@section('idPage', $idPage)

@section('css')
    <link rel="stylesheet" href="{{ asset('/assets/css/projects/caixeta/style.css') }}">
@endsection

@section('js')
    <script type="module" src="{{ asset('/assets/js/projects/caixeta/web.js') }}" async defer></script>
@endsection

@section('favicon')
    <link rel="shortcut icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/caixeta/favicon.png') }}" />
@endsection

@section('header')
    @include('includes.caixeta.web.header')
@endsection

@section('main')
    <section id="quemSomos">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="bold text-center title">Quem Somos</h2>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <img src="{{ asset('/assets/img/caixeta/quem_somos_entrada.jpg') }}" class="w-100 h-100" alt=""
                        title="">
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <img src="{{ asset('/assets/img/caixeta/quem_somos_entrada_2.jpg') }}" class="w-100 h-100"
                        alt="" title="">
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <img src="{{ asset('/assets/img/caixeta/quem_somos_entrada_3.jpg') }}" class="w-100 h-100"
                        alt="" title="">
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <img src="{{ asset('/assets/img/caixeta/quem_somos_faixada.jpeg') }}" class="w-100 h-100" alt=""
                        title="">
                </div>

                <div class="col-12">
                    <h5>A empresa Caixeta Auto Peças Ltda. – EPP foi fundada em 08/06/1976, na cidade de Patrocínio/MG.
                        Desde a sua fundação vem se consolidando como uma das melhores loja de autopeças do mercado. São 38
                        anos oferecendo a mais alta qualidade em peças, acessórios, latarias, lanternas, retrovisores, e
                        acabamentos para carros nacionais e importados com profissionais altamente qualificados. Com uma
                        equipe de vendas preparada para prestar sempre o melhor atendimento e ajudá-lo a encontrar
                        exatamente o que precisa entre os mais de 20.000 itens à disposição em nossos estoques.</h5>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="info">
                        <h3 class="text-center"> <i class="fa-solid fa-bullseye"></i> <span class="bold">Missão</span>
                        </h3>
                        <ul>
                            <li>
                                <h5>Oferecer produtos que acompanhe a evolução do mercado com preços competitivos.</h5>
                            </li>
                            <li>
                                <h5>Contribuir para o desenvolvimento de nossos clientes e fornecedores, com transparência e
                                    ética comercial.</h5>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="info">
                        <h3 class="text-center"><i class="fa-solid fa-eye"></i> <span class="bold">Visão</span></h3>
                        <ul>
                            <li>
                                <h5>Através do crescimento sustentável, ser referência no setor.</h5>
                            </li>
                            <li>
                                <h5>Sempre ressaltando a inovação e a qualidade dos serviços prestados aos nossos clientes e
                                    fornecedores, valorizados pelo entusiasmo e comprometimento de nossa equipe de
                                    colaboradores.</h5>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="info">
                        <h3 class="text-center"><i class="fa-solid fa-heart"></i> <span class="bold">Valores</span></h3>
                        <ul>
                            <li>
                                <h5>Encantar nossos clientes é nosso principal objetivo e ponto de honra.</h5>
                            </li>
                            <li>
                                <h5>Valorização dos nossos colaboradores e incentivo ao seu desenvolvimento profissional e
                                    pessoal.</h5>
                            </li>
                            <li>
                                <h5>Contribuir para o crescimento de nossa nação, pagando corretamente os impostos e
                                    tributos devidos.</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="categorias">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="bold text-center title">Categorias</h2>
                </div>

                <div class="col-12">
                    <p>Explore nossa ampla seleção de produtos automotivos, incluindo peças de reposição, acessórios e
                        componentes essenciais para manter o seu veículo em perfeitas condições. Encontre tudo o que você
                        precisa, desde abraçadeiras até velas de ignição, em um só lugar.</p>
                </div>

                @foreach ($categories as $key => $category)
                    <x-caixeta.itemCategoriaMain category="{{ $category['item'] }}" icon="{{ $category['icon'] }}" />
                @endforeach
            </div>
        </div>
    </section>

    <section id="contato">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="bold text-center title">Contato</h2>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="text-center">
                        <img src="{{ asset('assets/img/caixeta/logo.png') }}" class="w-50" alt=""
                            title="" />
                    </div>

                    <h6 class="word-break">Oferecemos serviços especializados em mecânica, auto elétrica, baterias,
                        escapamentos, troca de óleo e comércio de peças e acessórios para autos. </h6>
                </div>

                <div class="col-lg-4 col-12 list-infos">
                    <ul class="dados">
                        <li><a href="https://maps.app.goo.gl/VEpoSakCd5s8f6es6" target="_blank"><i
                                    class="fa-solid fa-location-dot"></i> <span class="word-break">R. Pinto Dias, 215 - São
                                    Francisco</span></a></li>
                        <li><i class="fa-solid fa-location-crosshairs"></i><span>Patrocínio - MG</span></li>
                        <li><a href="mailto:comercial@caixetaautopecas.com.br"><i class="fa-solid fa-envelope"></i> <span
                                    class="word-break">comercial@caixetaautopecas.com.br</span></a></li>
                        <li><a href="https://wa.me/+553438327001" target="_blank"><i class="fa-solid fa-phone"></i> <span
                                    class="word-break">(34) 3832-7001</span></a></li>
                    </ul>

                    <ul class="midia">
                        <li><a href="https://www.instagram.com/caixetaautopecas/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://www.facebook.com/caixetaautopecas/" target="_blank"><i
                                    class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/Caixetaap/" target="_blank"><i
                                    class="fa-brands fa-twitter"></i></a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3773.8728040596634!2d-46.99673192580422!3d-18.937023408155557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94afba8ebbd52bfb%3A0xdd852ec0ea49fa42!2sR.%20Pinto%20Dias%2C%20215%20-%20S%C3%A3o%20Francisco%2C%20Patroc%C3%ADnio%20-%20MG%2C%2038744-522!5e0!3m2!1spt-BR!2sbr!4v1714480210982!5m2!1spt-BR!2sbr"
                        style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    @include('includes.caixeta.web.footer')
@endsection
