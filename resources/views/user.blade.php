@extends('layouts.menu')

@section('content')
    <style>
        .post{
            width:200px;
            height:150px;
            background-color:red;
            margin-bottom: 50px;
        };

   


    </style>
    <div class="container">
    <div class="row">
        <div class="col-sm-4 text-center">
            <div style  = "margin-top: 100px"; >
                <img style="width: 200px; height: 200px" src="{{asset('imgs/perfil3.jpg')}}"class="img-fluid rounded-circle">
            </div>
        </div>


        <div class="col-sm-8" style = "margin-top: 100px">
            <h3>Marcos Paulo</h3>
            <h6 style = "color:gray">alberto@teste.com</h6>



            <div class = "mt-5 text-justify">
                <p>Me chamo Alberto, tenho 32 anos  e toco guitarra a 20,
                meus gêneros favoritos são: Rock, pagode e funk.</p>
            </div>
            
            <input type="button" class = "btn btn-light btn-generos" value="Rock">
            <input type="button" class = "btn btn-light btn-generos" value="MPB">
            <input type="button" class = "btn btn-light btn-generos" value="Sertanejo">
            <br>
            <input type="button" class = "btn btn-light btn-generos" value="Pagode">
            <input type="button" class = "btn btn-light btn-generos" value="Samba">
            <input type="button" class = "btn btn-light btn-generos" value="Country">


            <div class = "mt-5">
            
                <p>Publicações:</p>
                <div class = "d-flex flex-wrap text-center">
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
@endsection