@extends('admin.layouts.menu')
@section('title')
ADMIN - Cadastrar Genero Musical
@endsection
@section('content')
<div class="container">
    <h1 class="text-center">Cadastrar genero musical</h1>
    <form action="{{route('admin.generos.store')}}" method="POST"
        class="col-sm-12 col-md-8 mx-auto my-4 jumbotron">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome do genero musical</label>
            <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                value="{{old('descricao')}}">
            @error('descricao')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Genero</button>
        </div>
    </form>
</div>
@endsection
