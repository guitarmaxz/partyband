<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/login_cadastro.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/home.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <title>@yield('title')</title>
</head>

<body>

    <div class="menu-responsivo">

        <div class="ico-mobile" data-toggle="modal" data-target=".bd-example-modal-lg">
            <a href="#"><img src="{{asset('imgs/ico/add.png')}}" class="cinza" alt="Raio"></a>
        </div>

        <div class="ico-mobile">
            <a href="#"><img src="{{asset('imgs/ico/noti-black.png')}}" class="cinza" alt="Raio"></a>
        </div>
        <a href="{{route('home')}}">
            <div class="logo-mobile">
                <h1>PARTY</h1>
                <div class="raio">
                    <img src="{{asset('imgs/ico/raio-black.png')}}" class="cinza" alt="Raio">
                </div>
                <h1>BAND</h1>
            </div>
        </a>
        <div class="ico-mobile">
            <a href="#"><img src="{{asset('imgs/ico/lupa.png')}}" class="cinza" alt="Raio"></a>
        </div>
        <div class="ico-mobile">
            <a href="#"><img src="{{asset('imgs/ico/perfil-black.png')}}" class="cinza" alt="Raio"></a>
        </div>
    </div>

    <div class="content-menu">
        <div class="menu">
            <a href="{{route('home')}}">
                <div class="logo">
                    <h1>PARTY</h1>
                    <div class="raio">

                        <img src="{{asset('imgs/ico/raio-cinza.png')}}" class="cinza" alt="Raio">
                        <img src="{{asset('imgs/ico/raio-red.png')}}" class="red" alt="Raio">
                    </div>
                    <h1>BAND</h1>
                </div>
            </a>

           <div class="search-box">
                <form action="{{route('search')}}" method="post">
                    @csrf
                    <input type="text" class="search" placeholder="Pesquisar..." name="search">
                    <input type="submit" hidden>
                </form>
            </div>
      

            <div class="icos">
                <ul class="content-icos">
                    <li class="ico-menu">
                        <a href="{{route('home')}}"><img src="{{asset('imgs/ico/home.png')}}" alt="home"></a>
                        <a href="{{route('home')}}"><img class="ico-red" src="{{asset('imgs/ico/home_red.png')}}"
                                alt="home"></a>
                    </li>
                    <li class="ico-menu">
                        <a href="#"><img src="{{asset('imgs/ico/busola.png')}}" alt="procurar"></a>
                        <a href="#"><img class="ico-red" src="{{asset('imgs/ico/busola_red.png')}}" alt="procurar"></a>
                    </li>
                    <li class="ico-menu">
                        <a href="#"><img src="{{asset('imgs/ico/noti.png')}}" alt="notificação"></a>
                        <a href="#"><img class="ico-red" src="{{asset('imgs/ico/noti_red.png')}}" alt="notificação"></a>
                    </li>
                    <li class="ico-menu user">
                        <img src="{{asset('imgs/ico/perfil.png')}}" alt="perfil"></a>
                        <img class="ico-red" src="{{asset('imgs/ico/perfil_red.png')}}" alt="perfil">

                        <div class="perfil-cascate">
                            <ul>
                                <a href="{{route('perfil')}}">
                                    <li class="edit">Editar perfil</li>
                                </a>
                                <a href="#" class="nav-link "
                                    onclick="event.preventDefault(); document.querySelector('form.logout').submit();">
                                    <li>Sair</li>
                                </a>
                            </ul>
                            <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <main role="main">
        <div class="container my-4">@include('flash::message')</div>
        @yield('content')
    </main>
</body>

</html>
