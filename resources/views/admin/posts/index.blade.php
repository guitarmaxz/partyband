@extends('admin.layouts.menu')

@section('title')
ADMIN - Postagem
@endsection

@section('content')

<div class="container my-4">
    {{-- <h1 class="display-4 text-center my-4">Postagem Cadastrados</h1>
    <a href="{{route('admin.instrumentos.create')}}" class="btn btn-lg btn-success">Cadastrar um novo instrumento</a>
    --}}
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Nome do usuario</th>
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
