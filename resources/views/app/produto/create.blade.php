@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <h1>Adicionar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('app.produto') }} "> Voltar </a> </li>
                <li> <a href=" "> Consulta </a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action=" ">
                    @csrf
                    <input type="text" name="nome" value="" placeholder="Nome" class="borda-preta">

                    <input type="text" name="descricao" value="" placeholder="Descrição" class="borda-preta">

                    <input type="text" name="peso" value="" placeholder="Peso" class="borda-preta">

                    <select name="unit_id">
                        <option> -- Selecione a Unidade de Medida --</option>
                        @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}"> {{$unidade->description}} </option>
                        @endforeach
                    </select>

                    <button type="submit" class="borda-preta"> <b>Cadastrar</b> </button>
                </form>
            </div>
        </div>

    </div>
@endsection
