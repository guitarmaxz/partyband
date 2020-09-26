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
</head>

<body style="background-image: url('imgs/background2.jpg'); background-repeat: no-repeat; background-position: center;">
    <main role="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{asset('imgs/logopartyband2.png')}}" alt="" class="img-fluid mt-5">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12 col-md-6 mx-auto jumbotron" style="opacity: 0.9">
                    <div class="justify-content-center form_container my-5 mx-auto col-10">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="Insira um usuário" >

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="email">{{ __('E-mail') }}</label>
                                <input id="email" type="text"
                                    class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Insira seu melhor E-mail"
                                    value="{{ old('email') }}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password">{{ __('Senha') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    value="{{ old('password') }}" >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm">{{ __('Confirme a senha') }}</label>

                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" >
                             
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Já possue conta? <a href="{{route('login')}}" class="ml-2">Entre aqui</a>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Esqueceu a senha?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
