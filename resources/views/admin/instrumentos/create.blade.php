@extends('admin.layouts.menu')
@section('title')
ADMIN - Cadastrar Instrumento
@endsection
@section('content')
<div class="container">
    <h1 class="text-center">Cadastrar instrumento</h1>
    <form action="{{route('admin.instrumentos.store')}}" method="POST"
        class="col-sm-12 col-md-8 mx-auto my-4 jumbotron">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome do instrumento</label>
            <input type="text" name="descricao" class="form-control @error('descricao') is-invalid @enderror"
                value="{{old('descricao')}}">
            @error('descricao')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Instrumento</button>
        </div>
    </form>
</div>
@endsection
