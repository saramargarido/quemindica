@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/layout-menuAdmin.css') }}">
@endsection


{{-- MENU --}}
<header class="container-fluid fixed-top nav-off">

    {{-- ÁRREA MENU --}}
    <nav class="container-fluid mb-1 navbar navbar-expand-lg navbar-dark info-color">

        {{-- LOGO E QUEM INDICA --}}
        @auth
            {{-- LOGO E QUEM INDICA --}}
            <div class="nav-brand logo-nav-admin">
                <a class="navbar-brand" href="{{ route('user', Auth::user()->username) }}">
                    <img src="{{ asset('/imagens/logo/logo-icon.svg') }}" alt="Logo Quem Indica" class="img-fluid">
                </a>
                <a class="navbar-brand qi-title-admin" href="{{ route('user', Auth::user()->username) }}">
                    Quem Indica
                </a>
            </div>
        @endauth

        @guest

            {{-- LOGO E QUEM INDICA --}}
            <div class="nav-brand logo-nav-admin">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('/imagens/logo/logo-icon.svg') }}" alt="Logo Quem Indica" class="img-fluid">
                </a>
                <a class="navbar-brand qi-title-admin" href="{{ route('home') }}">
                    Quem Indica
                </a>
            </div>
        @endguest

        {{-- MENU RESPONSIVO --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
            aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        {{-- BOTÕES SUPORTE, LOGIN E REGISTRAR --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">

                @guest
                    {{-- BOTÃO LOGIN --}}
                    <li class="nav-item botao-loginRegistrar">
                        <a href="{{ route('login') }}" class="nav-link">
                            <button class="btn-yellow-admin">
                                <strong>Login</strong>
                            </button>
                        </a>
                    </li>

                    @if (Route::has('register'))
                        <li class="nav-item botao-loginRegistrar">
                            <a href="#" class="nav-link">
                                <button class="btn-yellow-admin">
                                    <strong>{{ __('Registrar') }}</strong>
                                </button>
                            </a>
                        </li>
                    @endif

                @else

                    {{-- NOME DO USUÁRIO + BOTÃO LOGOUT
                    --}}
                    <li class="nav-item dropdown">

                        {{-- NOME DO USUÁRIO --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle drop-menuoff" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}

                            @if (Auth::user()->photo == null)
                                <img src="{{ asset('imagens/institucional/usuario.png') }}" alt="foto default"
                                    class="rounded-circle avatar-menu-admin">
                            @else
                                <img src="{{ asset('uploads/photos/' . Auth::user()->photo) }}"
                                    class="rounded-circle avatar-menu-admin">
                            @endif
                        </a>

                        {{-- BOTÃO SAIR --}}
                        <div class="dropdown-menu dropdown-menu-right rounded-0 links-menuoff"
                            aria-labelledby="navbarDropdown">

                            {{-- BOTÃO SAIR --}}
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
        </div>
    </nav>


</header>
