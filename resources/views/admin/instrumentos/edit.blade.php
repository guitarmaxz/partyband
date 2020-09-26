@extends('admin.layouts.menu')
@section('title')
    ADMIN - Editar instrumento
@endsection

@section('content')
    <div class="container">
        <h1 class="text-center">Editar Instrumento</h1>
    <form action="{{route('admin.instrumentos.update', ['instrumento' => $instrumentos->id])}}" method="post" class="col-sm-12 col-md-8 mx-auto my-4 jumbotron">
            @csrf
            @method("PUT")
    
            <div class="form-group">
                <label>Nome do instrumento</label>
                <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror" value="{{$instrumentos->descricao}}">
                @error('descricao')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-lg btn-success">Atualizar Instrumento</button>
            </div>
        </form>
    </div>
  
    
@endsection