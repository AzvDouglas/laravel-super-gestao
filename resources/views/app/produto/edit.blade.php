@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina">
            <h1>Editar Produto</h1>
        </div>

        <div class="menu">
            <ul>
                <li> <a href="{{ route('produto.index') }}"> Voltar </a> </li>
                <li> <a href=" "> Consulta </a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('produto.update', ['produto'=>$produto->id]) }}">
                    @csrf
                    @method('PUT')
                    <select name="fornecedor_id">
                        <option> -- Selecione o Fornecedor --</option>
                        @foreach($fornecedores as $fornecedor)
                            <option value="{{$fornecedor->id}}" {{ $produto->fornecedor_id ?? old('fornecedor_id') == $fornecedor->id ? 'selected' : '' }}> {{$fornecedor->nome}} </option>
                        @endforeach
                    </select>
                    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : ' ' }}

                    <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
                    {{ $errors->has('nome') ? $errors->first('nome') : ' ' }}

                    <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
                    {{ $errors->has('descricao') ? $errors->first('descricao') : ' ' }}

                    <input type="text" name="peso" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
                    {{ $errors->has('peso') ? $errors->first('peso') : ' ' }}

                    <select name="unit_id">
                        <option> -- Selecione a Unidade de Medida --</option>
                        @foreach($unidades as $unidade)
                            <option value="{{$unidade->id}}" {{ ($produto->unit_id ?? old('unit_id')) == $unidade->id ? 'selected' : '' }}> {{$unidade->id}} </option>
                        @endforeach
                    </select>
                    {{ $errors->has('unit_id') ? $errors->first('unit_id') : ' ' }}


                    <button type="submit" class="borda-preta"> <b>Salvar</b> </button>
                </form>
            </div>
        </div>

    </div>
@endsection
