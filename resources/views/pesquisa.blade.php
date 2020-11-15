@extends('layouts.menu')
@section('title')
    Resultado pesquisa
@endsection
<style>
    .distancia{
        margin-top: 5.3em;
    }
</style>
@section('content')
    <div class="container distancia">
        <div class="table-responsive">
            <table class="table table-striped">
                <h1 class="text-center">Resultado da pesquisa</h1>
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Foto</th>
                            <th class="text-center">Nome do musico</th>
                            <th class="text-center">Informações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($busca as $post)
                        <tr>
                        <td scope="row" style="width: 20%;" class="text-center"><img src="{{asset('imgs/ico/icon.png')}}" width="80" alt=""></td>
                            <td scope="row" style="width: 50%;">{{$post->nome}}</td>
                        <td scope="row" style="width: 20%;" class="text-center"><a href="{{route('mostrar')}}">Ver contato</a></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>
        </div>
    </div>
@endsection