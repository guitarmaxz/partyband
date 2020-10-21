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
    <div class="bg-lateral-perfil">
        <div class="contem-cards">
           <div class="cards c1"></div>
           <div class="cards c2"></div>
           <div class="cards c3"></div>
        </div>
    </div>

        <div class="contem-form-perfil">
            <h1>PERFIL</h1>
            <form method="POST" action="{{ route('cadastro.store') }}" enctype="multipart/form-data">
                @csrf
                <label class=newbtn>
                    <img id="blah" src="http://placehold.it/120x120" class="ft-perfil">
                        <input id="pic" class='pis' onchange="readURL(this);" type="file" name="pic">                  
                </label>
                
                <div class="content">
                <div class="contem-inputs">
                    
                <div class="grp-input nome">
                        <label for="">Nome</label>
                        <input class="input_pb form-control @error('nome') is-invalid @enderror" name="nome"
                                            value="{{ old('nome') }}"  autocomplete="nome" autofocus" type="text">
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                    
                <div class="grp-input sexo" >
                        <label for="">sexo</label>
                        <select name="sexo" id="sexo" class="form-control" style="width:100%" >
                            <option selected>Selecione</option>
                            <option id="Masculino">Masculino</option>
                            <option id="Feminino">Feminino</option>
                        </select> 
                </div>

                <div class="grp-input cidade">
                        <label for="">Telefone</label>
                        <input id="telefone" type="text"
                                            class="input_pb form-control @error('telefone') is-invalid @enderror" name="telefone"
                                            value="{{ old('telefone') }}" onkeyup="mascara('(##) #####-####',this,event,true)">

                                        @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                </div>

                <div class="grp-input estado" >
                        <label for="">Estado</label>
                        <select name="federacao" class="form-control"  required >
                            @foreach ($federacao as $dados)
                                <option value="{{$dados->id}}">{{$dados->uf}}</option>
                            @endforeach
                        </select>  
                </div>

                <div class="grp-input email">
                        <label for="">E-mail</label>
                        <input class="input_pb " type="text">
                </div>
                
                <div class="grp-input biografia">
                <label for="">Biografia</label>
                <textarea class=" input_pb form-control @error('biografia') is-invalid @enderror" name="biografia" id="biografia" value="{{ old('biografia') }}" rows="3" style="width:100%" ></textarea>
                        @error('biografia')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                
                <div class="grp-input instrumento">
                        <label for="">Instrumento</label>
                        <select name="instrumento[]" class="form-control grp-input" required   multiple>
                            @foreach ($instrumentos as $dados)
                            <option value="{{$dados->id}}">{{$dados->descricao}}</option>
                            @endforeach
                        </select>  
                </div>

                <div class="grp-input generos">
                        <label for="">Generos</label>
                        <select name="genero[]" class="form-control grp-input" required multiple>
                            @foreach ($generos as $dados)
                                <option value="{{$dados->id}}">{{$dados->descricao}}</option>
                            @endforeach
                        </select>  
                </div>

                <div class="cotem-btn-perfil">
                    <button type="submit" class="btn_pb">
                    {{ __('Gerar Perfil') }}
                    </button>
                    <a href="{{route('logout')}}" class="text-center">Voltar</a>
                </div>
                    
                </div>

            </form>
        </div>
        
    </main>

    <script src="{{asset('js/mascara.js')}}"></script>
</body>
</html>
