@extends('site.layouts.basico')

@section('titulo', 'Login')

@include('site.layouts._components.nav-bar')
@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            Formulário de login
            <div style="width:30%; margin-left: auto; margin-right: auto">
                <form action="{{ route('site.login') }}" method="post" >
                    @csrf
                    <input name="user" value="{{ old('user') }}" type="text" placeholder="Usuário" class="borda-preta">
                    {{ $errors->has('user') ? $errors->first('user') : '' }}

                    <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}

                    <button type="submit"> Acessar </button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>

        </div>
    </div>


    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="img/facebook.png">
            <img src="img/linkedin.png">
            <img src="img/youtube.png">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="img/mapa.png">
        </div>
    </div>
@endsection
