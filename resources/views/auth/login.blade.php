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
<!--Coded with love by Mutiullah Samim-->

<body>
    <main>
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
            <h2>LOGIN</h2>
           <div class="form">
            @if (\Session::has('danger'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('danger') !!}</li>
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">
                    <input id="username" placeholder="Seu usuario" type="text"
                        class="input_pb @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}">

                    @error('username')
                    <span class="invalid-feedback " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group mb-2">
                    <input id="password" type="password" placeholder="Sua Senha"
                        class="input_pb @error('password') is-invalid @enderror" name="password"
                        >
                    @error('password')
                    <span class="invalid-feedback " role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <!--
                <div class="form-group row">
                    <div class="col-md-6 my-2 ">
                        <div class="form-check">
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> 
                -->
                <div style="text-align: right">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Esqueceu sua senha?') }}
                    </a>
                    @endif
                </div>
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" class="btn_pb ">
                        {{ __('Login') }}
                    </button>
                </div>
                <br>
                <div style="text-align: center">
                    Ainda não tem uma conta? <a href="{{route('register')}}" class="ml-2">Cadastra-se</a>
                </div>
            </form>
           </div>
        </div>
    </main>
</body>

</html>
