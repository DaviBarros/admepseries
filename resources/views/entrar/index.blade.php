@extends('layout')

@section('cabecalho')
Acesso
@endsection

@section('conteudo')   
    
    <form method="post"  class="form-signin text-center" style="max-width: 330px; margin:0 auto;">
        @csrf
        <h1>Login</h1>
        <input type="email" id="email" name="email" class="form-control m-1" placeholder="Digite seu e-mail" required/>
        <input type="password" id="password" name="password" class="form-control m-1" placeholder="Digite sua senha" required/>

        <button type="submit" class="btn btn-primary btn-block m-1">Entrar</button>

        <a href="{{ route('telaregistrousuario') }}" class="btn btn-secondary m-1 btn-block">Registrar-se</a>
    </form>

@endsection
