@extends('layouts.layout')

@section('title', 'Serviços')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/servicos.css') }}">
@endsection

@section('header')
    @include('layouts.layout-menulogado')
@endsection


@section('content')


    <div class="section-services">
        <div class="row">


            {{-- SEÇÃO FILTROS --}}
            <div class="col-lg-3 col-md-12 col-sm-12 side-filters">
                <div class="service-card-sticky">

                    {{-- ÁREA PESQUISA --}}
                    <div class="row service-search">
                        <div class="container-fluid">

                            <form action="{{ route('servicos') }}" method="GET" class="form-inline search-service-form">
                                @csrf

                                <input value="{{ Request::get('busca') }}" name="busca" type="text"
                                    class="input-service-search" placeholder="Pesquisar Serviço">

                                <button type="submit" class="btn service-search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                    <form action="{{ route('servicos') }}" method="GET">
                        @csrf

                        {{-- ÁREA FILTRO POR PREÇO --}}
                        <div class="service-card price-range-service">

                            <div class="service-card-header">
                                <h6 class="title text-center">Faixa de Preço</h6>
                            </div>

                            <div class="service-price">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input type="number" class="form-control price-range-service-input" id="min-prec"
                                            placeholder="R$ 0,00">
                                    </div>

                                    <div class="form-group col-md-6 text-right">
                                        <label>Max</label>
                                        <input type="number" class="form-control price-range-service-input" id="max-prec"
                                            placeholder="R$ 1.000,00">
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- ÁREA FILTRO POR CATEGORIA DO SERVIÇO
                        --}}
                        <div class="service-card service-category">

                            <div class="service-card-header">
                                <h6 class="title text-center">Segmento</h6>
                            </div>

                            <div class="service-card-body">

                                @foreach ($segments as $segment)

                                    <div class="form-check my-2">

                                        <input class="form-check-input" type="checkbox" name="filtros[{{ $segment->tipo }}]"
                                            value="{{ $segment->id }}" @isset(request()->get('filtros')[$segment->tipo])
                                        checked @endisset>
                                        <label class="form-check-label"
                                            for="{{ $segment->id }}">{{ $segment->tipo }}</label>

                                    </div>

                                @endforeach

                            </div>
                        </div>


                        <button type="submit" class="btn btn-outline-light py-2">Filtrar</button>

                        {{-- LIMPAR FILTRO --}}
                        <button type="submit" class="btn btn-outline-light py-2">
                            <a href="{{ route('servicos') }}">Limpar Filtro</a>
                        </button>

                    </form>

                </div>

            </div>


            {{-- SEÇÃO SERVIÇOS --}}
            <div class="col-lg-9 col-md-12 col-sm-12 all-services">

                <h1 class="text-center title-services-section">Serviços</h1>

                {{-- service-cardS SERVIÇOS --}}
                <div class="row">

                    {{-- SERVIÇO 1 --}}
                    @forelse ($services as $service)
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="service-card">

                                <div class="services-cards-all">
                                    {{-- IMAGEM SERVIÇO
                                    --}}

                                    @if ($service->photo == null)
                                        <img src="{{ asset('/imagens/servicos/servico-3.jpg') }}" alt="service-card Serviço"
                                            class="photo-service img-fluid">
                                    @else
                                        <img src="{{ asset('uploads/services/' . $service->photo) }}" alt="Foto Serviço"
                                            class="photo-service img-fluid">
                                    @endif

                                    {{-- BOTÃO
                                    --}}
                                    <div class="service-hire">
                                        <a href="{{ route('servico.show', $service->id) }}">
                                            <button class="btn btn-hire-service">Contratar
                                                <i class="fa fa-check-square-o"></i>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="service-card-body">

                                        {{-- TÍTULO SERVIÇO
                                        --}}

                                        <div class="text-service">
                                            <span class="service-title">Serviço: </span>
                                            <span class="service-text"> {{ $service->servico }}</span>
                                        </div>
                                        <div class="text-service">
                                            <span class="service-title">Prestador: </span>
                                            <span class="service-text"> {{ $service->nome_prestador }}</span>
                                        </div>
                                        <div class="text-service">
                                            <span class="service-title">Local: </span>
                                            <span class="service-text"> {{ $service->local }}</span>
                                        </div>
                                        <div class="text-service">
                                            <span class="service-title">Segmento: </span>
                                            <span class="service-text"> {{ $service->segment->tipo }}</span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    @empty
                        <div class="empresa">
                            <h2>Não encontrado!</h2>
                        </div>
                    @endforelse

                </div>

            </div>


        </div>
    </div>

@endsection



@section('footer')
@include('layouts.footer-logado')
@endsection
