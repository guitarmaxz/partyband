@extends('admin.layouts.menu')
@section('title')
ADMIN - Bandas
@endsection

@section('content')
<div class="container-fluid col-10 my-4">
    <h1 class="display-4 text-center">Bandas Cadastradas</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th>Nome da banda</th>
                <th class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bandas as $dados)
            <tr>
                <td style="width: 10%" class="text-center">{{$dados->id}}</td>
                <td style="width: 60%">{{$dados->nome}}</td>
                <td style="width: 20%" class="d-flex text-center">
                    <div class="btn-group text-center">
                        <a href="#" class="btn btn-sm btn-primary mx-2">VISUALIZAR</a>
                        <form action="{{route('admin.bandas.destroy', ['banda' => $dados->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {{$bandas->links()}}
    </div>
</div>
@endsection