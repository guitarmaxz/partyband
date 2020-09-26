<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
    .foto_notificacao{
    width:40px;
    height:40px;;
}

@media (max-width: 760px) {
 
 .header-menu{
     margin-bottom: 150px;
 }

}
</style>
</head>

<body>
    <header role="heading" class="header-menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand col-2 text-center py-3 mr-sm-5" href="{{route('home')}}"><img src="{{asset('imgs/logopartyband.png')}}"
                alt="logo" width="150"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-sm-12 col-md-5">
                <form  method="POST" action="{{route('search')}}" class="form-inline my-5 my-lg-0 form-search-menu">
                    @csrf
                    <input class="form-control mr-sm-5 search-menu" type="search" placeholder="Pesquisar" aria-label="Search" name="search">
                </form>
            </div>
            @auth
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">
                            <img src="{{asset('imgs/ico/home.png')}}"  alt="" width="24"> Home
                        </a>
                    </li>
                    @if(auth()->user()->perfil == "Administrador")
                <li class="nav-item"><a class="nav-link d-flex" href="{{route('admin.usuarios.store')}}">Acessar painel Administrador</a></li>
                    <a href="#" class="nav-link"
                     onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                     <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                        @csrf
                     </form> 
                     @else 
                     <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('imgs/ico/noti.png')}}"  alt="" width="20">Notificações 
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                             Notificações
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <img class="foto_notificacao rounded-circle" src="{{asset('/imgs/perfil4.jpg') }}" alt="">
                            </div>
                            <div>
                                <div class="small text-gray-500">08 de Julho</div>
                                <span class="font-weight"><b>Tomás Eduardo</b> Criou uma Nova Banda</span>
                            </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <img class="foto_notificacao rounded-circle" src="{{asset('/imgs/perfil5.jpg') }}" alt="">
                            </div>
                            <div>
                                <div class="small text-gray-500">27 de Junho</div>
                                <span class="font-weight"><b>Ivana Pedrosa e Pablo Thiago</b> Curtiram sua publicação</span>
                            </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                            <div class="mr-3">
                                <img class="foto_notificacao rounded-circle" src="{{asset('/imgs/perfil6.jpg') }}" alt="">
                            </div>
                            <div>
                                <div class="small text-gray-500">25 de Junho</div>
                                <span class="font-weight"><b>Bianca Cortês</b> Convidou você para conhecer a banda dela</span>
                            </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Fechar Notificações</a>
                        </div>
                        </li>
                    <li class="nav-item dropdown mr-5">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{asset('imgs/ico/perfil.png')}}"  alt="" width="20">Perfil</a>
                        <div class="dropdown">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                                {{-- "{{route('perfil', ['id' => $usuarios])}}" --}}
                            <a class="nav-link" href="{{route('perfil')}}">Meu Perfil</a>
                                <a href="#" class="nav-link"
                                onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                            </div>
                            <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                                @csrf
                             </form> 
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            @endauth
        </nav>
    </header>
    <main role="main">
        <div class="container my-4">@include('flash::message')</div>
        @yield('content')
    </main>

    
</body>

</html>
