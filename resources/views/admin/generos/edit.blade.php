@extends('admin.layouts.menu')
@section('title')
    ADMIN - Editar Genero
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Genero</h1>
    <form action="{{route('admin.generos.update', ['genero' => $generos->id])}}" method="post" class="col-sm-12 col-md-8 mx-auto my-4 jumbotron">
            @csrf
            @method("PUT")
    
            <div class="form-group">
                <label>Nome do genero</label>
                <input type="text" name="descricao" class="form-control @error('genero') is-invalid @enderror" value="{{$generos->descricao}}" id="descricao">
                @error('descricao')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-lg btn-success">Atualizar Generos</button>
            </div>
        </form>
    </div>
  
    
@endsection