@section('style')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/layout-menulogado.css') }}">
@endsection


{{-- MENU --}}
<header>
    {{-- MENU --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top menu-log" id="mainNav">

        {{-- TÍTULO --}}
        <a href="{{ route('user', Auth::user()->username) }}">
            <img src="{{ asset('/imagens/logo/logo-icon.svg') }}" class="img-fluid logo-menu-log">
        </a>

        <a class="navbar-brand menu-log-title" href="{{ route('user', Auth::user()->username) }}">QUEM
            INDICA</a>

        {{-- SEÇÃO MENU NOTIFICAÇÕES, PESQUISAR E SAIR
        --}}

        {{-- BOTÃO MENU RESPONSIVO--}}
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU NAV --}}

        <div class="collapse navbar-collapse nav-log" id="navbarResponsive">
            <ul class="navbar-nav ml-auto menulog-components">

                {{-- FOTO USUÁRIO E LINKS --}}
                <div class="dropdown ml-auto links-drop-menu">

                    {{-- MENU AUTH --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">

                            {{-- NOME DO USUÁRIO E FOTO USUÁRIO
                            --}}

                            <a id="navbarDropdown" class="nav-link dropdown-toggle drop-arrow-menu" href="#"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}

                                @if (Auth::user()->photo == null)
                                    <img src="{{ asset('imagens/institucional/usuario.png') }}" alt="foto default"
                                        class="rounded-circle avatar-menu-log">
                                @else
                                    <img src="{{ asset('uploads/photos/' . Auth::user()->photo) }}"
                                        class="rounded-circle avatar-menu-log">
                                @endif
                            </a>

                            {{-- MENU DROPDOWN --}}
                            <div class="dropdown-menu dropdown-menu-right rounded-0 menulog-links"
                                aria-labelledby="messages">
                                <a class="dropdown-item" href="{{ route('user', Auth::user()->username) }}">Meu
                                    Perfil</a>
                                <a class="dropdown-item"
                                    href="{{ route('users', Auth::user()->username) }}">Usuários</a>
                                <a class="dropdown-item"
                                    href="{{ route('seguindo', Auth::user()->username) }}">Seguindo</a>
                                {{-- <a class="dropdown-item" href="#">Seguidores</a>
                                --}}
                                <a class="dropdown-item" href="{{ route('servicos') }}">Serviços</a>
                                <a class="dropdown-item" href="{{ route('suporte') }}">Suporte</a>
                                <a class="dropdown-item" href="{{ route('editarperfil', Auth::user()->id) }}">Editar
                                    Perfil</a>
                            </div>

                        </ul>
                    </div>
                    {{-- FINAL MENU AUTH --}}

                </div>

                {{-- ÁREA NOTIFICAÇÕES GERAIS --}}
                {{-- <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">


                        <i class="fa fa-fw fa-bell"></i>

                        <span class="d-lg-none titulo-not-mobile-menulog">Notificações
                            <span class="badge badge-pill not-badge-mobile">1 Nova</span>
                        </span>

                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="alertsDropdown">

                        <h6 class="dropdown-header">Novas Notificações</h6>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#">

                            <strong class="user-name">Marcia está te seguindo</strong>

                            <span class="small float-right text-muted">10:04</span>

                        </a>

                        <div class="dropdown-divider"></div>


                        <a class="dropdown-item small see-more-log" href="#">Ver Todas</a>

                    </div>
                </li> --}}


                {{-- BOTÃO SAIR --}}
                <li class="nav-item logout-menu">

                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i><span>Sair</span></a>

                </li>

            </ul>
        </div>

    </nav>


    {{-- MODAL SAIR --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title title-modal" id="exampleModalLabel">Desejar sair da conta?</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>

                </div>

                <div class="modal-body logout-text">Selecione <b>sair</b> abaixo para sair da conta</div>

                <div class="modal-footer">

                    {{-- BOTÃO CANCELAR --}}
                    <button class="btn btn-sm logout-cancel" type="button" data-dismiss="modal">Cancelar
                    </button>

                    {{-- BOTÃO SAIR --}}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        <button class="btn btn-sm logout-btn" type="button" data-dismiss="modal">{{ __('Logout') }}
                        </button>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>



                </div>

            </div>
        </div>
    </div>
</header>
