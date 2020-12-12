@extends('layouts.template')

@section('title', 'Login')

@section('content')

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        <div class="input-group form-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" id="email" name="email" class="form-control" placeholder="usuário" required>   
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <div class="input-group form-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" id="password" name="password" class="form-control" placeholder="senha" required>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <div class="row align-items-center remember">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Lembrar senha
        </div>
        <div class="form-group">
            <input type="submit" value="Entrar" class="btn float-right login_btn">
        </div>
    </form>
</div>

@endsection

@section('footer')
<div class="d-flex justify-content-center links">
    Não tem uma conta?<a href="{{ route('register') }}">Cadastre-se</a>
</div>
<div class="d-flex justify-content-center links">
    <a href="{{ route('password.request') }}">Esqueceu sua senha?</a>
@endsection