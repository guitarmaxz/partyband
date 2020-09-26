@extends('admin.layouts.menu')

@section('title')
ADMIN - Instrumentos
@endsection

@section('content')
<div class="container my-4">
    <h1 class="display-4 text-center my-4">Instrumentos Cadastrados</h1>
<a href="{{route('admin.instrumentos.create')}}" class="btn btn-lg btn-success">Cadastrar um novo instrumento</a>
    <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Instrumento</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instrumentos as $dados)
            <tr>
                <td style="width: 10%" class="text-center">{{$dados->id}}</td>
                <td style="width: 70%">{{$dados->descricao}}</td>
                <td style="width: 20%" class="d-flex text-center">
                    <a href="{{route('admin.instrumentos.edit', ['instrumento' => $dados->id])}}"
                        class="btn btn-sm btn-primary mx-2">EDITAR</a>
                <form action="{{route('admin.instrumentos.destroy', ['instrumento' => $dados->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{$instrumentos->links()}}
    </div>
</div>
@endsection

