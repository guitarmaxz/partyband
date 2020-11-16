@extends('layouts.menu')
@section('title')
Meu Perfil
@endsection
@section('content')
<style>
    .distancia {
        margin-top: 200px;
    }

    .post {
        width: 300px;
        height: 300px;
        margin-top: 10px;
    }

    .center {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .posts-perfil {
        min-height: 300px;
        display: flex;
        margin-top: 20px;
    }

    .texto-postagem {
        width: 300px;
        height: 300px;
        background-color: black;
        position: absolute;
        opacity: 0;
        text-align: justify;
        padding: 10px;
    }

    .texto-postagem p {
        color: white;
    }

    .post:hover .texto-postagem {
        transition: 0.5s;
        opacity: 0.8;
    }
    .pointer{
        cursor: pointer;
    }
</style>
<div class="container distancia">
    <div class="row">
        <div class="col-sm-3 text-center Impact">

            <img class="foto_user rounded-circle" src="@if(Auth()->User()->musicos->foto == " Sem imagem") http://placehold.it/170x170 @else {{asset('storage/perfil/'.Auth()->user()->id. '/' . Auth()->user()->musicos->foto)}} @endif "
                alt=" imagem perfil">

            <h3 class="item-perfil">{{auth()->user()->musicos->nome}}</h3>


            <span class="item-perfil"></span>
            <h6 class="item-perfil" data-toggle="modal" data-target="#PerfilModal"><a class="pointer">Editar Perfil</a></h6>
            <h6 class="item-perfil" data-toggle="modal" data-target="#PerfilModalSenha"><a class="pointer">Editar Senha</a></h6>
            <a href="#" class="nav-link pb-color" data-toggle="modal" data-target="#modelId">Excluir Perfil</a>
            <a href="#" class="nav-link text-decoration-none pb-color" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>

            <form action="{{route('logout')}}" class="logout" method="post" style="display:none;">
                @csrf
            </form>
            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Excluir Perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Deseja realmente excluir seu Perfil?
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('destroy') }}" class="btn btn-md btn-danger" id="modal-btn-si">Sim</a>
                            <a href="{{ route('perfil') }}" class="btn btn-md botaoMaster" id="modal-btn-no">Não</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="modal fade" id="PerfilModalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="password" id="old_password" placeholder="senha atual" class="form-control old_password @error('old_password') is-invalid @enderror" name="old_password" />
                                @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <label for="senha">Nova senha</label>
                                <input type="password" id="password" placeholder="nova senha" class="form-control password @error('password') is-invalid @enderror" name="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <br>
                                <label for="password">Repita a senha</label>
                                <input type="password" id="repeat_password" placeholder="confirmação da nova senha" class="form-control repeat_password @error('repeat_password') is-invalid @enderror" name="repeat_password" />
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

                <h5 class="card-title Impact">Biografia</h5>
                <div class="card card-perfil">
                    <p class="card-text">{{auth()->user()->musicos->biografia}}</p>
                </div>
                <h5 class="title-perfil Impact">Gêneros Musicais</h5>
                <div class="item-perfil">
                    <div class="row">
                        <div class="col-sm-12 Impact">
                            @foreach (Auth()->User()->musicos->generos as $genero)
                            <input type="button" class="btn btn-light btn-generos" value="{{$genero->descricao}}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-5">

                    <h5 class="title-perfil Impact">Publicações</h5>
                    <div class="d-flex flex-wrap text-center posts-perfil center">
                        @foreach ($query as $dados)
                        @if($dados->postagem == null)
                        <p>Sem postagem</p>
                        @else
                        <div class="mx-3 post">
                            <img class="fotos" src="{{asset('storage/postagem/'.$dados->usuario_id. '/' . $dados->imagem)}}" alt="">

                            <div class="texto-postagem  center">
                                <p>{{$dados->postagem}}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="PerfilModal" tabindex="-1" role="dialog" aria-labelledby="PerfilModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>







                    <form class="perfil_form" action="{{route('update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')



                        <label class="newbtn">
                            <img id="blah" src="@if($dados->foto == " Sem imagem") http://placehold.it/170x170 @else {{asset('storage/perfil/'.Auth()->user()->id. '/' . Auth()->user()->musicos->foto)}} @endif " class=" img-fluid shadow border border-dark">

                            <input id="pic" class='pis' onchange="readURL(this);" type="file" name="pic">
                            <br>
                            <p class="text-center">Foto de perfil</p>
                            @error('pic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </label>





                        <div class="form-row">
                            <div class=" col-md-6">
                                <div class="form-group row">
                                    <label for="nome" class="col-sm-3 col-form-label">Nome:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nome" name="nome" value="{{auth()->user()->musicos->nome}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email" value="{{auth()->user()->email}}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="biografia" class="col-sm-3 col-form-label">Biografia:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="biografia" name="biografia" rows="3">{{auth()->user()->musicos->biografia}}</textarea>
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
                                                <input class="form-check-input" type="checkbox" id="genero" value="{{$genero->id}}" name="genero[]" checked>
                                                <label class="form-check-label" for="inlineCheckbox1">{{$genero->descricao}}</label>
                                            </div>
                                            @else
                                            <div class="form-check form-check-inline" style="width:28%">
                                                <input class="form-check-input" type="checkbox" id="genero" value="{{$genero->id}}" name="genero[]">
                                                <label class="form-check-label" for="inlineCheckbox1">{{$genero->descricao}}</label>
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