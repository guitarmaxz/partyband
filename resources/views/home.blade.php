@extends('layouts.menu')

@section('title')
    PartyBand
@endsection
@section('content')
<style>
    .centered {
        margin: 0 auto !important;
        float: none !important;
    }
    .distancia{
        margin-top: 5.3em;
    }

</style>

<div class="container-fluid bg-light text-center distancia">
        <div class="row">
        <div class="col-sm-2 lateral1">
            <div class="position-fixed mt-5" data-toggle="modal" data-target="#addPost">
                <a href="#"><img style="width: 100px; height: 100px" src="{{asset('imgs/ico/add.png')}}"class="img-fluid"></a>
            </div>
        </div>

        <div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="{{route('postar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <input type="file" name="imagem" class="@error('imagem') is-invalid @enderror">
                            @error('imagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                          <label for="post">Escreva uma postagem</label>
                          <textarea class="form-control @error('postagem') is-invalid @enderror" name="postagem" id="postagem" rows="3" value="{{old('postagem')}}"></textarea>
                          @error('postagem')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>  
                        
                        <button type="submit">Enviar</button>
                </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-6 overflow-auto">
            
                
            @foreach ($query as $dados)
            <div class="card mb-3">
                
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> 
                        <img src="{{asset('storage/perfil/'.$dados->user_id. '/' . $dados->foto)}}" alt="perfil" class=" img-fluid rounded-circle p-3" style="width:100px; height: 100px">
                        </div>
                    <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">{{$dados->username}}</div>
                    </div>
                </div>
                <img class="card-img-top" src="{{asset('storage/postagem/'. $dados->usuario_id . '/' . $dados->imagem)}}" alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                            class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                <p class="card-text text-justify">{{$dados->postagem}}</p>
                <p class="card-text"><small class="text-muted">postado: {{$dados->created_at}}</small></p>
                </div>
               
            </div>
            @endforeach
            
        </div>

        
        <div class="col-sm-4 lateral2">
            <div class="d-flex flex-column bd-highlight mb-3">
                @foreach ($usuarios as $dados)
                <div class="p-2 bd-highlight mr-auto d-flex">
                    <div class="container" style="width:100px; height: 100px;">
                        <img src="{{asset('storage/perfil/'.$dados->user_id. '/' . $dados->foto)}}" alt="perfil" class=" img-fluid rounded-circle p-2" style="width:100px; height: 100px">
                    </div>
                    <div class="mt-5">
                    <p>
                        Usuario: <a href="#">{{$dados->username}}</a>
                    </p>
                    <p>
                        Estado: <a href="#">{{$dados->uf}}</a>
                    </p>
                   
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
    </div>
</div>
</div>
@endsection
