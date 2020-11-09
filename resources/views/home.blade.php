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

<div class="main">
    <div class="add">
        <div class="content-ico" data-toggle="modal" data-target=".bd-example-modal-lg">
            <img class="fotos" src="{{asset('imgs/ico/add-cinza.png')}}"  alt="add">
            <img class="fotos add-red" src="{{asset('imgs/ico/add-red.png')}}" alt="add">
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content center">
                <H1>POSTAR</H1>
                <form class="form-modal " runat="server">
                    <input id="imgInp" style="display: none;" type="file"/>
                    <div class="add-post-img">
                        <div class="foto-post-modal" id="foto-post-modal">
                            <img class="fotos" id="blah" src="{{asset('imgs/ico/camera.png')}}" alt="foto de perfil">
                        </div>
                    </div>
                </form>
                
                <div class="text-post-modal">
                    <textarea name="text-post" id="" class="textarea-post" placeholder="Adicione um comentario ao seu Post"></textarea>
                </div>
                <button class="btn_modal">POSTAR</button>
            </div>
        </div>
    </div>

    <div class="post">
        <div class="content-post">
            <div class="content-user">
                <div class="foto-perfil-post">
                    <img src="{{asset('imgs/perfil5.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Aline Faria</h5>
                </div>
            </div>

            <div class="foto-post">
                <img class="fotos" src="{{asset('imgs/mgirl.jpg')}}" alt="foto de perfil">
            </div>
            <div class="like">

            </div>
            <div class="texto-post">
                <p>
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                </p>
            </div>

            <span>Postado em 06/11/2020 as 23:49</span>
        </div>
        <div class="content-post">
            <div class="content-user">
                <div class="foto-perfil-post">
                    <img src="{{asset('imgs/perfil3.jpg')}}" alt="foto de perfil">
                </div>

                <div class="nome">
                    <h5>Matheus da Silva</h5>
                </div>
            </div>

            <div class="foto-post">
                <img class="fotos" src="{{asset('imgs/background2.jpg')}}" alt="foto de perfil">
            </div>

            <div class="texto-post">
                <p>
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                    Venhão conferir o show da banda Los Pablitos, amanhã as 22:00 no shoping de jau
                </p>
            </div>
            <span>Postado em 06/11/2020 as 23:49</span>
        </div>
    </div>
    
    <div class="perfils">
   
        <div class="content-perfils">
            <div class="content-perfil">
                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('imgs/perfil5.jpg')}}" alt="foto de perfil">
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
                
                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
            }

            $("#imgInp").change(function() {
            readURL(this);
        });

        $(document).ready(function(){
            $("#foto-post-modal").click(function(){
            self.executar();
            });
        });

        function executar(){
        $('#imgInp').trigger('click');
        }
    </script>
</div>
@endsection
