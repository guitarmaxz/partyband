@extends('admin.layouts.menu')

@section('title')
    Admin - Mudar senha
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="block">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        <form action="{{route('admin.updatesenha')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group col-8 mx-auto my-4">
                    <label for="senhaa">Senha atual</label>
                    <input type="password" id="old_password" placeholder="senha atual" class="form-control old_password @error('old_password') is-invalid @enderror" name="old_password" />
                    @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="senha">Nova senha</label>
                    <input type="password" id="password" placeholder="nova senha" class="form-control password @error('password') is-invalid @enderror" name="password" />
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <br>
                    <label for="password">Repita a senha</label>
                    <input type="password" id="repeat_password" placeholder="confirmação da nova senha" class="form-control repeat_password @error('repeat_password') is-invalid @enderror" name="repeat_password" />
                    @error('repeat_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <button type="submit" class="btn btn-lg btn-success my-3">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
