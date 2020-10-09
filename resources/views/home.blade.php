@extends('layouts.menu')

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
            @foreach ($postagens as $dados)
                
           
            <div class="card mb-3">
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> 
                            <img src="{{asset('imgs/perfil.jpg')}}" alt="perfil" class=" img-fluid rounded-circle p-3" style="width:100px; height: 100px">
                        </div>
                        <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">Marcos Paulo</div>
                    </div>
                </div>
                <img class="card-img-top" src="{{asset('imgs/banda.jpg')}}" alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <img class="card-img-top"
                                src="{{asset('imgs/ico/like.png')}}" alt="Card image cap"></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                <p class="card-text text-justify">{{$dados->postagem}}</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
            @endforeach
          

            <div class="card mb-3">
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> <img
                                src="{{asset('imgs/perfil5.jpg')}}" alt="" class=" img-fluid rounded-circle p-3"
                                style="width:100px; height: 100px"></div>
                        <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">Leticia da Silva</div>
                    </div>

                </div>
                <img class="card-img-top" src="{{asset('imgs/post1.jpg')}}"  alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <img class="card-img-top"
                                src="{{asset('imgs/ico/like.png')}}" alt="Card image cap"></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                    <p class="card-text text-justify">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> <img
                                src="{{asset('imgs/perfil3.jpg')}}" alt="" class=" img-fluid rounded-circle p-3"
                                style="width:100px; height: 100px"></div>
                        <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">Roberto Andrades</div>
                    </div>

                </div>
                <img class="card-img-top" src="{{asset('imgs/post2.jpg')}}" alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <img class="card-img-top"
                                src="{{asset('imgs/ico/like.png')}}" alt="Card image cap"></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                    <p class="card-text text-justify">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> <img
                                src="{{asset('imgs/perfil6.jpg')}}" alt="" class=" img-fluid rounded-circle p-3"
                                style="width:100px; height: 100px"></div>
                        <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">Amanda Medeiros</div>
                    </div>

                </div>
                <img class="card-img-top" src="{{asset('imgs/post3.jpg')}}" alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <img class="card-img-top"
                                src="{{asset('imgs/ico/like.png')}}" alt="Card image cap"></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                    <p class="card-text text-justify">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body " style="height:100px">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="margin-top: -25px; margin-left: -30px"> <img
                                src="{{asset('imgs/perfil4.jpg')}}" alt="" class=" img-fluid rounded-circle p-3"
                                style="width:100px; height: 100px"></div>
                        <div class="p-2 bd-highlight" style="margin-top: 20px; margin-left: -10px">Nathalia Ribeiro</div>
                    </div>

                </div>
                <img class="card-img-top" src="{{asset('imgs/post4.jpg')}}" alt="Card image cap">
                <div class="card-body" style="min-height:150px;">
                    <div class="d-flex flex-row bd-highlight mb-3">
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <img class="card-img-top"
                                src="{{asset('imgs/ico/like.png')}}" alt="Card image cap"></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i style='font-size:30px'
                                class='far'>&#xf075;</i></div>
                        <div class="p-2 bd-highlight" style="width:50px; height:70px"> <i class='far fa-paper-plane'
                                style='font-size:30px'></i></div>
                    </div>
                    <p class="card-text text-justify">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>

        </div>

        
        <div class="col-sm-4 lateral2">
            <div class="d-flex flex-column bd-highlight mb-3">
                @foreach ($usuarios as $dados)
                <div class="p-2 bd-highlight mr-auto d-flex">
                    <div class="container" style="width:100px; height: 100px;">
                        <img src="{{asset('imgs/ico/icon.png')}}" alt="" class="img-fluid rounded-circle p-1">
                    </div>
                    <div class="mt-5">
                    <a href="#">{{$dados->username}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
    </div>
</div>
</div>
@endsection
