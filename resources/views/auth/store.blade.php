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
<!--Coded with love by Mutiullah Samim-->
<body style="background-image: url('imgs/background2.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <main role="main">
        <div class="container mt-5">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{asset('imgs/logopartyband2.png')}}" alt="" class="img-fluid mt-5">
                </div>
            </div>
            <br>
            <div class="row">
                
                <div class="col-sm-12 col-md-10 mx-auto jumbotron" style="opacity: 0.9">
                    <div class="justify-content-center form_container mx-auto">
                        <div class="container my-4">@include('flash::message')</div>
                        <h1 class="display-4 text-center mb-5">Cadastro</h1>
                        <form method="POST" action="{{ route('cadastro.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-6">
                                    <input id="nome" type="text"
                                        class="form-control @error('nome') is-invalid @enderror" name="nome"
                                        value="{{ old('nome') }}"  autocomplete="nome" autofocus>

                                    @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                         
                          

                            <div class="form-group row">
                                    <label for="biografia"
                                    class="col-md-4 col-form-label text-md-right">{{ __('biografia') }}</label>

                                <div class="col-md-6">
                                    <textarea class="form-control @error('biografia') is-invalid @enderror" name="biografia" id="biografia" value="{{ old('biografia') }}" rows="3" ></textarea>
                                    @error('biografia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="form-group row">
                                <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Telefone') }}</label>
                                <div class="col-md-6">
                                    <input id="telefone" type="text"
                                        class="form-control @error('telefone') is-invalid @enderror" name="telefone"
                                        value="{{ old('telefone') }}" onkeyup="mascara('(##) #####-####',this,event,true)">

                                    @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                           <div class="form-group row">
                            <label for="sexo"
                            class="col-md-4 col-form-label text-md-right">{{ __('sexo') }}</label>

                        <div class="col-md-6">
                            <select name="sexo" id="sexo" class="form-control" >
                                <option selected>Selecione</option>
                                <option id="Masculino">Masculino</option>
                                <option id="Feminino">Feminino</option>
                        </select> 
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="Instrumento"
                            class="col-md-4 col-form-label text-md-right">{{ __('Instrumento') }}</label>

                        <div class="col-md-6">
                            <select name="instrumento[]" class="form-control" required   multiple>
                                @foreach ($instrumentos as $dados)
                            <option value="{{$dados->id}}">{{$dados->descricao}}</option>
                                @endforeach
                            </select>  
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="genero"
                            class="col-md-4 col-form-label text-md-right">{{ __('Gênero Musicais') }}</label>

                        <div class="col-md-6">
                            <select name="genero[]" class="form-control" required multiple>
                                @foreach ($generos as $dados)
                                    <option value="{{$dados->id}}">{{$dados->descricao}}</option>
                                @endforeach
                            </select>  
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="federacao"
                            class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                        <div class="col-md-6">
                            <select name="federacao" class="form-control" required >
                                @foreach ($federacao as $dados)
                                     <option value="{{$dados->id}}">{{$dados->uf}}</option>
                                @endforeach
                            </select>  
                        </div>
                        </div>

                     

            

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                <a href="{{route('logout')}}" class="ml-3 btn btn-primary">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{asset('js/mascara.js')}}"></script>
</body>

</html>
