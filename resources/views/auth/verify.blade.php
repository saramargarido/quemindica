@extends('layouts.layout-menuoff')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Verifique o seu Email') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Uma nova verificação foi enviada para o seu email.') }}
                            </div>
                        @endif

                        {{ __('Antes de prosseguir, por favor verifique o seu e-mail para verificação.') }}
                        {{ __('Caso não tenha recebido o email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('Clique aqui para solicitar um novo envio') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
