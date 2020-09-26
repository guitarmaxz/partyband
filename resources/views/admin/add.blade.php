@extends('admin.layouts.menu')

@section('title', 'Adicionar Administrador')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="block">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form action="{{route('admin.store')}}" method="post">
                @csrf
                <div class="form-group col-8 mx-auto my-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{old('name')}}" placeholder="Insira o nome do novo administrador...">
                    @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <label for="email">E-mail</label>
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <br>
                    <label for="password">Senha</label>
                    <input type="text" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group row">
                        <div class="col-md-6">
                            <select name="perfil" id="perfil" class="form-control" required hidden>
                                <option selected>Administrador</option>
                        </select> 
                        </div>
                        </div>
                    <button type="submit" class="btn btn-lg btn-success my-3">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
