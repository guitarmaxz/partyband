@extends('layouts.menu')
@section('title')
Meu Perfil
@endsection
@section('content')
<style>
    .distancia {
        margin-top: 5.3em;
    }

    .post{
            width:200px;
            height:150px;
            background-color:red;
            margin-bottom: 50px;
        };
    

</style>
<div class="container distancia">
    <div class="row">
        <div class="col-sm-3 text-center ">
            
            @if(auth()->user()->image != null)
            <img class="foto_user rounded-circle" src="{{asset('/storage/users/auth()->user()->image') }}" alt="">
            @else
            <img class="foto_user rounded-circle" src="{{asset('/imgs/banda.jpg') }}" alt="">
            @endif
            <h5 class="item-perfil">{{auth()->user()->musicos->nome}}</h5>
            <span class="item-perfil"></span>
            <h6 class="item-perfil" data-toggle="modal" data-target="#PerfilModal"><a>Editar Perfil</a></h6>
            <h6 class="item-perfil" data-toggle="modal" data-target="#PerfilModalSenha"><a>Editar Senha</a></h6>
            <a href="#" class="nav-link text-decoration-none"
                                onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                           
                            <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                                @csrf
                             </form> 
        </div>
        <div class="modal fade" id="PerfilModalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Alterar Senha</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('updatesenhaa')}}" method="post">
                            @csrf
                            @method('PUT')
                           
                            <div class="form-group col-8 mx-auto my-4">
                                <label for="senhaa">Senha atual</label>
                                <input type="password" id="old_password" placeholder="senha atual"
                                    class="form-control old_password @error('old_password') is-invalid @enderror"
                                    name="old_password" />
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <label for="senha">Nova senha</label>
                                <input type="password" id="password" placeholder="nova senha"
                                    class="form-control password @error('password') is-invalid @enderror"
                                    name="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <label for="password">Repita a senha</label>
                                <input type="password" id="repeat_password" placeholder="confirmação da nova senha"
                                    class="form-control repeat_password @error('repeat_password') is-invalid @enderror"
                                    name="repeat_password" />
                                @error('repeat_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <button type="submit" class="btn btn-lg btn-success my-3">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-9">
            <div class="card">
              
                <h5 class="card-title">Biografia:</h5>
                <div class="card card-perfil">
                    <p class="card-text">{{auth()->user()->musicos->biografia}}</p>
                </div>
                <h5 class="title-perfil">Gêneros Musicais:</h5>
                <div class="item-perfil">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach (Auth()->User()->musicos->generos as $genero)
                            <input type="button" class="btn btn-light btn-generos" value="{{$genero->descricao}}">
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class = "mt-5">
            
                    <p>Publicações:</p>
                    <div class = "d-flex flex-wrap text-center">
                        <div class="text-center">
                            @foreach ($postagens as $dados)
                            {{$dados->postagem}}
                            @endforeach
                           
                        </div>


                            <div class = "mx-3 post">
                                <img src="{{asset('imgs/banda.jpg')}}" alt="" style = "width:100%; height:100%">
                            </div>
    
                            <div class = " post">
                                <img src="{{asset('imgs/post1.jpg')}}" alt="" style = "width:100%; height:100%">
                            </div>
    
                            <div class = "mx-3 post">
                                <img src="{{asset('imgs/post4.jpg')}}" alt="" style = "width:100%; height:100%">
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="PerfilModal" tabindex="-1" role="dialog" aria-labelledby="PerfilModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-sm-2">
                            <img class="foto_user_alterar rounded-circle" src="{{asset('/imgs/banda.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-10">
                            <span class="perfil_name_alterar">{{auth()->user()->musicos->nome}}</span><br>

                            <label id="perfil_label_alterarfoto" for='selecao-arquivo'>Alterar Foto</label>
                            <input id='selecao-arquivo' name='image' type='file'>
                        </div>

                    </div>

                <form class="perfil_form" action="{{route('update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class=" col-md-6">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-3 col-form-label">Nome:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nome" name="nome"
                                            value="{{auth()->user()->musicos->nome}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{auth()->user()->email}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="biografia" class="col-sm-3 col-form-label">Biografia:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="biografia" name="biografia"
                                            rows="3">{{auth()->user()->musicos->biografia}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class=" form-group col-md-1">
                            </div>
                            <div class=" form-group col-md-5">
                                <div class="item-perfil">
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <h5 class="">Generos:</h5>
                                           
                                            @foreach ($generos as $genero)
                                            @if(auth()->user()->musicos->generos->contains($genero))
                                            <div class="form-check form-check-inline" style="width:28%">
                                                <input class="form-check-input" type="checkbox" id="genero"
                                                    value="{{$genero->id}}" name="genero[]" checked>
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">{{$genero->descricao}}</label>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline" style="width:28%">
                                                <input class="form-check-input" type="checkbox" id="genero"
                                                    value="{{$genero->id}}" name="genero[]">
                                                <label class="form-check-label"
                                                    for="inlineCheckbox1">{{$genero->descricao}}</label>
                                            </div>
                                            @endif
                                            @endforeach
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>

                  


                </div>
            </div>
        </div>


        </div>

        @endsection
