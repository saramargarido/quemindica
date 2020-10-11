@extends('layouts.layout')

@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/support.css') }}">
@endsection

@section('title', 'Suporte')

@section('header')
    @include('layouts.layout-menuoff')
@endsection

@section('content')

    {{-- FORMULÁRIO SUPORTE --}}
    <section class="form-section-page text-center">

        <div class="card d-flex justify-content-center form-div-page">
            <div class="row">

                {{-- BANNER --}}
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="{{ asset('/imagens/institucional/suporte-novo-2.png') }}" width="100%" height="auto"> </div>

                {{-- TÍTULO --}}
                <div class="col-lg-6">
                    <h4 class="modal-title">Suporte</h4>

                    {{-- FORMULÁRIO --}}
                    <form action="{{ route('suporte') }}" method="POST" class="container">
                        @csrf

                        {{-- NOME --}}
                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="modal-support-input" type="text" name="name" placeholder="Nome">
                                <span class="focus-modal-support-input"></span>
                                <span class="support-icon-input">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        {{-- EMAIL --}}
                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <input class="modal-support-input" type="text" name="email" placeholder="Email">
                                <span class="focus-modal-support-input"></span>
                                <span class="support-icon-input">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>

                        {{-- MENSAGEM --}}
                        <div class="row">
                            <div class="form-group col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="wrap-modal-support-input">
                                    <textarea class="modal-support-input" name="message" placeholder="Mensagem"></textarea>
                                    <span class="focus-modal-support-input"></span>
                                </div>
                            </div>
                        </div>

                        {{-- BOTÃO --}}
                        <div class="row">

                            <div class="form-group col-lg-12">
                                <button type="submit" class="btn form-input-btn">
                                    Enivar
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>

@endsection

@section('modal')
    @include('layouts.modal')
@endsection

@section('footer')
    @include('layouts.footer')
@endsection
