@extends('admin.layouts.menu')

@section('title')
ADMIN - Postagem
@endsection

@section('content')

<div class="container my-4">
    {{-- <h1 class="display-4 text-center my-4">Postagem Cadastrados</h1>
    <a href="{{route('admin.instrumentos.create')}}" class="btn btn-lg btn-success">Cadastrar um novo instrumento</a>
    --}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Criar postagem
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comunicar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form class="form-modal" action="{{route('admin.postar')}}" method="POST" enctype="multipart/form-data" runat="server">
                        @csrf
                        
                        <div class="text-post-modal">
                            <textarea name="postagem" id="postagem"
                                class="textarea-post @error('postagem') is-invalid @enderror"
                                placeholder="Adicione um comentario ao seu Post"></textarea>
                            @error('postagem')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn_modal">POSTAR</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <p>
        @foreach ($admin as $item)
            <div class="table-responsive">
                <h3 class="text-dark font-weight-bold">Postagens de ADM</h3>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Postagem</th>
                        <th>Ações</th>
                    </tr>
                    <tr>
                    <td>{{$item->postagem}}</td>
                        <td>
                            <form action="{{route('admin.posts.destroy', ['post' => $item->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button> <br>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        @endforeach
    </p>
    <br><br>
    <h3 class="text-dark font-weight-bold">Postagens de Usuarios</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Nome do usuário</th>
                <th>Postagem</th>
                <th>Imagem</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postagem as $dados)
            <tr>
               
                <td style="width: 10%" class="text-center">{{$dados->usuario_id}}</td>
                <td style="width: 20%">{{$dados->username}}</td>
                <td style="width: 30%">{{$dados->postagem}}</td>
                <td style="width: 20%"><img
                        src="{{asset('storage/postagem/'.$dados->usuario_id. '/' . $dados->imagem)}}" alt="perfil"
                class="img-fluid img-thumbnail pop" width="90"></td>
                {{-- MODAL --}}
                <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <img src="{{asset('storage/postagem/'.$dados->usuario_id. '/' . $dados->imagem)}}" alt="" class="img-fluid img-thumbnail">
                                <button type="button" class="close" data-dismiss="modal"><span
                                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <img src="" class="imagepreview" style="width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                


                <td style="width: 20%" class="d-flex text-center">
                    <form action="{{route('admin.posts.destroy', ['post' => $dados->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                    <form action="{{route('admin.posts.update', ['post' => $dados->id])}}" method="post">
                        @csrf
                        @method("PUT")
                        <button type="submit" class="btn btn-sm btn-primary mx-3">ACEITAR</button>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{$postagem->links()}}
    </div>
</div>


@endsection
