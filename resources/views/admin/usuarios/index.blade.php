@extends('admin.layouts.menu')

@section('title')
ADMIN - Usuários
@endsection

@section('content')
<div class="container my-4">
    <h1 class="display-4 text-center my-4">Usuarios Cadastrados</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Nome do Usuário</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
    
            @foreach($usuarios as $dados)
            <tr>
                <td style="width: 10%" class="text-center">{{$dados->id}}</td>
                <td style="width: 50%">{{$dados->username}}</td>
                <td style="width: 20%" class="text-center">
                <form action="{{route('admin.usuarios.destroy', ['usuario' => $dados->id])}}" method="post">
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
        {{$usuarios->links()}}
    </div>
</div>
@endsection

