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
    <link rel="stylesheet" type="text/css" href="{{asset('css/login_cadastro.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
    <main role="main">
        <div class="bg-lateral">
            <div class="black-fosc">
                <h1>PARTY</h1> 
                <div class="raio">
                    <img src="{{asset('icos/raio_branco.png')}}" alt="">
                </div> 
                <h1>BAND</h1>
            </div>
        </div>

        <div class="contem-form">
            <h2>CADASTRO</h2>
            <div class="form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-2">
                            <input class="input_pb" id="username" type="text"
                                @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" placeholder="Insira um usuário" >

                            @error('username')
                            <span class="invalid-feedback msg-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-2">
                            <input id="email" type="text"
                                class="input_pb @error('email') is-invalid @enderror" name="email" placeholder="Insira seu melhor E-mail"
                                value="{{ old('email') }}">

                            @error('email')
                            <span class="invalid-feedback msg-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="input-group mb-2">
                            <input id="password" type="password"
                                class="input_pb @error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" placeholder="Insira sua senha">

                            @error('password')
                            <span class="invalid-feedback msg-error" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <input id="password-confirm" type="password" class="input_pb"
                                    name="password_confirmation" placeholder="Confirmar senha">
                        
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" class="btn_pb ">
                                {{ __('Register') }}
                            </button>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            
                            </div>
                        </div>
                    </form>
                </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Já possue conta? <a href="{{route('login')}}" class="ml-2">Entre aqui</a>
                </div>
                <div class="d-flex justify-content-center">
                    
                        @if (Route::has('password.request'))
                        <a class=" btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                        @endif
                    
                </div>
            </div>
        </div>
      
    </main>
</body>

</html>
