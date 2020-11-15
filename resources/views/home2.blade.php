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

    .distancia {
        margin-top: 5.3em;
    }

</style>

<div class="main">
    <div class="add">
        <div class="content-ico" data-toggle="modal" data-target=".bd-example-modal-lg">
            <img class="fotos" src="{{asset('imgs/ico/add-cinza.png')}}" alt="add">
            <img class="fotos add-red" src="{{asset('imgs/ico/add-red.png')}}" alt="add">
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content center">
                <H1>POSTAR</H1>
                <form class="form-modal" action="{{route('postar')}}" method="POST" enctype="multipart/form-data" runat="server">
                    @csrf
                    <input id="imgInp" style="display: none;" type="file" class="@error('imagem') is-invalid @enderror"
                        name="imagem" />
                    @error('imagem')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="add-post-img">
                        <div class="foto-post-modal" id="foto-post-modal">
                            <img class="fotos img-modal" id="blah" src="{{asset('imgs/ico/camera.png')}}" alt="foto de perfil">
                        </div>
                    </div>

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
        </div>
    </div>

    {{-- ****************************************************** --}}

    @foreach ($query as $dados)
    <div class="post">
        <div class="content-post">
            <div class="content-user">
                <div class="foto-perfil-post">
                    <img src="{{asset('storage/perfil/'.$dados->user_id. '/' . $dados->foto)}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>{{$dados->username}}</h5>
                </div>
            </div>

            <div class="foto-post">
                <img class="fotos" src="{{asset('storage/postagem/'. $dados->usuario_id . '/' . $dados->imagem)}}"
                    alt="imagem da postagem">
            </div>
            <div class="like">

            </div>
            <div class="texto-post">
                <p>
                    {{$dados->postagem}}
                </p>
            </div>

            <span>{{$dados->created_at}}</span>
        </div>
        @endforeach
    </div>


    <div class="perfils">
        <div class="content-perfils">
            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil2.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Aline Faria</h5>  
                </div>
            </div>

            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Roberto Magnus</h5>    
                </div>
            </div>

            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Matheus Nascimento</h5>                  
                </div>
            </div>

            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil3.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                <h5>Gabriel Almeida</h5>   
                </div>
            </div>

            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil4.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Roberta Pereira</h5>         
                </div>
            </div>

            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil5.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Jessica Faria</h5>        
                </div>
            </div>
        </div>
    </div>













    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });

        $(document).ready(function () {
            $("#foto-post-modal").click(function () {
                self.executar();
            });
        });

        function executar() {
            $('#imgInp').trigger('click');
        }

    </script>
</div>
@endsection
