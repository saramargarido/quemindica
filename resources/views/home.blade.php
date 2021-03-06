@extends('layouts.layout')

@section('title', 'Home')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/home.css') }}">
@endsection

@section('header')
    @include('layouts.layout-menuoff')
@endsection

@section('content')

    {{-- ÁREA SEÇÃO BANNER --}}
    <section class="home-banner-section">
        <div class="container">

            {{-- BANNER --}}

            <img src="{{ asset('/imagens/institucional/trabalhadores-lupa.png') }}" class="img-fluid"
                alt="Banner Principal">

            <div class="row">
                <div class="home-banner-section-texto box">

                    {{-- TÍTULO --}}
                    <h4 class="text-center white mb-3">Procura um serviço?</h4>

                    {{-- TEXTO --}}
                    <p class="text-center">
                        No Quem Indica você encontra o que precisa com indicações
                        feitas pelas pessoas que você mais confia e ainda ajuda profissionais autônomos sem a necessidade de
                        cadastrá-los.
                        <br>Estamos prontos para ajudar você encontrar o profissional que precisa!
                    </p>

                </div>
            </div>

        </div>
    </section>


    {{-- ÁREA SEÇÃO CADASTRO --}}

    <section class="home-register-section">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-row justify-content-center">

                {{-- NOME --}}
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInput">Nome</label>
                    <input type="text" name="nome" class="form-control mb-2" id="nome" placeholder="Nome">
                </div>

                {{-- EMAIL --}}
                <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Email</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend atsign-input">
                            <div class="input-group-text">#</div>
                        </div>
                        <input type="codigo" name="codigo" class="form-control" id="codigo"
                            placeholder="Código de verificação">
                    </div>
                </div>

                {{-- BOTÃO CADASTRO --}}
                <div class="col-auto">
                    <button type="submit" class="btn home-register-btn mb-2">Cadastrar</button>
                </div>
            </div>
        </form>
    </section>


    {{-- ÁREA SEÇÃO SOBRE --}}
    <section class="home-about-section">

        <div class="container ">
            <div class="row align-items-center">
                <div class="col-xs-8 col-sm-6">
                    <h4 class="text-center mb-3">O que indica?</h4>
                    <p class="text-center px-5">
                        Não só de serviços e produtos que vivemos... aqui seu encontro
                        é perfeito
                        com cultura e lazer! Entre e descubra o que seus amigos estão vendo, ouvindo, lendo...
                    </p>
                </div>
                <div class="col-xs-4 col-sm-6">
                    <img src="{{ asset('/imagens/institucional/rede-social.png') }}" class="img-fluid">
                </div>
            </div>

        </div>
    </section>


    {{-- ÁREA SEÇÃO TIME --}}

    <section class="home-team-section">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-xs-4 col-sm-6">
                    <img src="{{ url('/imagens/institucional/team.png') }}" class="img-fluid worker"
                        alt="Banner Trabalhadores Time">
                </div>

                <div class="col-xs-8 col-sm-6">
                    <h3 class="text-center">
                        <strong>Quem Indica é uma rede social feita para todos!
                        </strong>
                    </h3>

                    <img src="{{ url('/imagens/logo/logo-icon.svg') }}" id="logo_banner"
                        class="rounded mx-auto d-block img-fluid" alt="Imagem Logo">

                    <p class="text-center">
                        <strong>E por todos!</strong>
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- VOLTAR PARA O TOPO - CSS NO ESTILO.CSS --}}

    <button onclick="topFunction()" title="Go to top" id="toTopBtn" class="btn toTopBtn" data-abc="true">
        <i class="fa fa-arrow-up"></i>
    </button>


@endsection

@section('modal')
    @include('layouts.modal')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
