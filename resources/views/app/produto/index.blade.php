@extends('app.layouts.basico')
@section('titulo', 'Produto')

@section('conteudo')
<style>
    img, svg {
        width: 30px;
    }
</style>
<div class="conteudo-pagina">

    <div class="titulo-pagina">
        <h1>Lista de Produtos</h1>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('produto.create') }}"> Novo </a> </li>
            <li> <a href=" "> Consulta </a> </li>
        </ul>

    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>unit_id</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }}</td>
                        <td>{{ $produto->unit_id }}</td>
                        <td> <a href="">Exlcuir</a> </td>
                        <td> <a href=" ">Editar</a> </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <div class="paginacao">
                {{ $produtos->links()}} <br>
                <!--Paginação de Registros-->
                Exibindo {{$produtos->count()}} produtos de {{$produtos->total()}}
                (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})

            </div>
        </div>

    </div>
</div>
@endsection
