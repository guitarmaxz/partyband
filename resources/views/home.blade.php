@extends('layouts.menu')

@section('content')
<style>
    .centered {
        margin: 0 auto !important;
        float: none !important;
    }

    .distancia {
        margin-top: 5.3em;
    }

    .bugado {
        opacity: 0;
    }

    .size-post {
        width: 100%;
        height: auto;
    }

    .texto-post {
        width: 100%;
        height: auto;

    }

    /*
*
* ===========================================================
*     HERO SECTION
* ===========================================================
*
*/
    .hero {
        padding: 6.25rem 0px !important;
        margin: 0px !important;
    }

    .cardbox {
        border-radius: 3px;
        margin-bottom: 20px;
        padding: 0px !important;
    }

    /* ------------------------------- */
    /* Cardbox Heading
---------------------------------- */
    .cardbox .cardbox-heading {
        padding: 16px;
        margin: 0;
    }

    .cardbox .btn-flat.btn-flat-icon {
        border-radius: 50%;
        font-size: 24px;
        height: 32px;
        width: 32px;
        padding: 0;
        overflow: hidden;
        color: #fff !important;
        background: #b5b6b6;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .cardbox .float-right .dropdown-menu {
        position: relative;
        left: 13px !important;
    }

    .cardbox .float-right a:hover {
        background: #f4f4f4 !important;
    }

    .cardbox .float-right a.dropdown-item {
        display: block;
        width: 100%;
        padding: 4px 0px 4px 10px;
        clear: both;
        font-weight: 400;
        font-family: 'Abhaya Libre', serif;
        font-size: 14px !important;
        color: #848484;
        text-align: inherit;
        white-space: nowrap;
        background: 0 0;
        border: 0;
    }

    /* ------------------------------- */
    /* Media Section
---------------------------------- */
    .media {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: start;
        align-items: flex-start;
    }

    .d-flex {
        display: -ms-flexbox !important;
        display: flex !important;
    }

    .media .mr-3 {
        margin-right: 1rem !important;
    }

    .media img {
        width: 48px !important;
        height: 48px !important;
        padding: 2px;
        border: 2px solid #f4f4f4;
    }

    .media-body {
        -ms-flex: 1;
        flex: 1;
        padding: .4rem !important;
    }

    .media-body p {
        font-family: 'Rokkitt', serif;
        font-weight: 500 !important;
        font-size: 14px;
        color: #88898a;
    }

    .media-body small span {
        font-family: 'Rokkitt', serif;
        font-size: 12px;
        color: #aaa;
        margin-right: 10px;
    }


    /* ------------------------------- */
    /* Cardbox Item
---------------------------------- */
    .cardbox .cardbox-item {
        position: relative;
        display: block;
    }

    .cardbox .cardbox-item img {}

    .img-responsive {
        display: block;
        max-width: 100%;
        height: auto;
    }

    .fw {
        width: 100% !important;
        height: auto;
    }


    /* ------------------------------- */
    /* Cardbox Base
---------------------------------- */
    .cardbox-base {
        border-bottom: 2px solid #f4f4f4;
    }

    .cardbox-base ul {
        margin: 10px 0px 10px 15px !important;
        padding: 10px !important;
        font-size: 0px;
        display: inline-block;
    }

    .cardbox-base li {
        list-style: none;
        margin: 0px 0px 0px -8px !important;
        padding: 0px 0px 0px 0px !important;
        display: inline-block;
    }

    .cardbox-base li a {
        margin: 0px !important;
        padding: 0px !important;
    }

    .cardbox-base li a i {
        position: relative;
        top: 4px;
        font-size: 16px;
        color: #8d8d8d;
        margin-right: 15px;
    }

    .cardbox-base li a span {
        font-family: 'Rokkitt', serif;
        font-size: 14px;
        color: #8d8d8d;
        margin-left: 20px;
        position: relative;
        top: 5px;
    }

    .cardbox-base li a em {
        font-family: 'Rokkitt', serif;
        font-size: 14px;
        color: #8d8d8d;
        position: relative;
        top: 3px;
    }

    .cardbox-base li a img {
        width: 25px;
        height: 25px;
        margin: 0px !important;
        border: 2px solid #fff;
    }


    /* ------------------------------- */
    /* Cardbox Comments
---------------------------------- */
    .cardbox-comments {
        padding: 10px 40px 20px 40px !important;
        font-size: 0px;
        text-align: center;
        display: inline-block;
    }

    .cardbox-comments .comment-avatar img {
        margin-top: 1px;
        margin-right: 10px;
        position: relative;
        display: inline-block;
        text-align: center;
        width: 40px;
        height: 40px;
    }

    .cardbox-comments .comment-body {
        overflow: auto;
    }

    .search {
        position: relative;
        right: -60px;
        top: -40px;
        margin-bottom: -40px;
        border: 2px solid #f4f4f4;
        width: 100%;
        overflow: hidden;
    }

    .search input[type="text"] {
        background-color: #fff;
        line-height: 10px;
        padding: 15px 60px 20px 10px;
        border: none;
        border-radius: 4px;
        width: 100%;
        font-family: 'Rokkitt', serif;
        font-size: 14px;
        color: #8d8d8d;
        height: inherit;
        font-weight: 700;
        display: flex;
    }

    .search button {
        position: absolute;
        right: 0;
        top: 0px;
        border: none;
        background-color: transparent;
        color: #bbbbbb;
        padding: 15px 25px;
        cursor: pointer;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .search button i {
        font-size: 20px;
        line-height: 30px;
        display: block;
    }


    /* ------------------------------- */
    /* Author
---------------------------------- */
    .author a {
        font-family: 'Rokkitt', serif;
        font-size: 16px;
        color: #00C4CF;
    }

    .author p {
        font-family: 'Rokkitt', serif;
        font-size: 16px;
        color: #8d8d8d;
    }
</style>

<div class="main">
    <div class="add">
        <div class="content-ico" data-toggle="modal" data-target=".bd-example-modal-lg">
            <img class="fotos" src="{{asset('imgs/ico/add-cinza.png')}}" alt="add">
            <img class="fotos add-red" src="{{asset('imgs/ico/add-red.png')}}" alt="add">
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg ml-post" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content center">
                <H1>POSTAR</H1>
                <form class="form-modal" action="{{route('postar')}}" method="POST" enctype="multipart/form-data" runat="server">
                    @csrf
                    <input id="imgInp" style="display: none;" type="file" class="@error('imagem') is-invalid @enderror" name="imagem" />
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
                        <textarea name="postagem" id="postagem" class="textarea-post @error('postagem') is-invalid @enderror" placeholder="Adicione um comentario ao seu Post"></textarea>
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

    <div class="post">
        @foreach ($admin as $item)
        <div class="card m-3">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title">COMUNICADO ADMINISTRADOR</h4>
                <p class="card-text">{{$item->postagem}}</p>
            </div>
        </div>
        @endforeach
        @foreach ($query as $item)
<<<<<<< HEAD
        <section class="hero size-post ">
            <div class="container size-post">
                <div class="row size-post">

                    <div class="col-lg-12 ">

                        <div class="cardbox shadow-lg bg-white">

                            <div class="cardbox-heading">
                                <!-- START dropdown-->
                                <div class="dropdown float-right">
                                    <button class="btn btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
                                        <em class="fa fa-ellipsis-h"></em>
                                    </button>
                                    <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Ocultar post</a>
                                        <a class="dropdown-item" href="#">Reportar</a>
                                    </div>
                                </div>
                                <!--/ dropdown -->
                                <div class="media m-0">
                                    <div class="d-flex mr-3">
                                        <a href=""><img class="img-fluid rounded-circle" src="{{asset('storage/perfil/'.$item->user_id. '/' . $item->foto)}}" alt="User"></a>
                                    </div>
                                    <div class="media-body">
                                        <p class="m-0">{{$item->username}}</p>
                                        <small><span><i class="icon ion-md-pin"></i> Nairobi, Kenya</span></small>
                                        <small><span><i class="icon ion-md-time"></i> 10 hours ago</span></small>
                                    </div>
                                </div>
                                <!--/ media -->
                            </div>
                            <!--/ cardbox-heading -->

                            <div class="center">
                                <img class="img-fluid" src="{{asset('storage/postagem/'.$item->user_id. '/' . $item->imagem)}}" alt="Image">
                            </div>
                            <!--/ cardbox-item -->
                            <div class="cardbox-base">
                                <ul class="float-right">
                                    <li><a><i class="fa fa-comments"></i></a></li>
                                    <li><a><em class="mr-5">12</em></a></li>
                                    <li><a><i class="fa fa-share-alt"></i></a></li>
                                    <li><a><em class="mr-3">03</em></a></li>
                                </ul>
                                <ul>
                                    <li><a><i class="fa fa-thumbs-up"></i></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/3.jpeg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/1.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/5.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a href="#"><img src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/2.jpg" class="img-fluid rounded-circle" alt="User"></a></li>
                                    <li><a><span>242 Likes</span></a></li>
                                </ul>
                            </div>
                            <!--/ cardbox-base -->
                            <div class="social-meta p-4">
                                <p>{{$item->postagem}}</p>
                            </div>
                            <div class="cardbox-comments ">

                                <span class="comment-avatar float-left">
                                    <a href=""><img class="rounded-circle" src="http://www.themashabrand.com/templates/bootsnipp/post/assets/img/users/6.jpg" alt="..."></a>
                                </span>
                                
                                <div class="search">
                                    <input placeholder="Write a comment" type="text">
                                    <button><i class="fa fa-camera"></i></button>
                                </div>
                                <!--/. Search -->

                            </div>


                            <!--/ cardbox-like -->
=======
        <div class="content-post">
            <div class="content-user">
                <div class="foto-perfil-post">
                    <img class="fotos"src="{{asset('storage/perfil/'.$item->user_id. '/' . $item->foto)}}" alt="foto de perfil">
                </div>
>>>>>>> fea71b7a331ea28838ef7f0060b9867083f551fe

                        </div>
                        <!--/ cardbox -->

<<<<<<< HEAD
                    </div>
                    <!--/ col-lg-6 -->

                </div>
                <!--/ row -->
            </div>
            <!--/ container -->
        </section>
=======
            <div class="foto-post">
                <img class="fotos" src="{{asset('storage/postagem/'.$item->user_id. '/' . $item->imagem)}}"" alt="foto de perfil">
            </div>
          
            <div class="texto-post">
                
                {{$item->postagem}}
            </div>

        <span>{{$item->created_at}}</span>
        </div>
>>>>>>> fea71b7a331ea28838ef7f0060b9867083f551fe
        @endforeach
    </div>

    <div class="perfils">
        <div class="content-perfils ml-5">

            @foreach ($usuarios as $dados)
            <div class="content-perfil">

                <div class="foto-perfil">
                    <img class="fotos circulo" src="{{asset('storage/perfil/'.$dados->user_id. '/' . $dados->foto)}}" alt="foto de perfil">
                </div>
                <div class="nome">
                    <h5>{{$dados->nome}}</h5>
                </div>

            </div>
            @endforeach




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

        $(document).ready(function() {
            $("#foto-post-modal").click(function() {
                self.executar();
            });
        });

        function executar() {
            $('#imgInp').trigger('click');
        }
    </script>
</div>
@endsection