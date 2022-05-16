<style>
    img, svg {
        width: 30px;
    }
</style>
<div class="conteudo-pagina">

    <div class="titulo-pagina">
        <h1>Listar Fornecedores</h1>
    </div>

    <div class="menu">
        <ul>
            <li> <a href="{{ route('app.fornecedor.adicionar') }}"> Novo </a> </li>
            <li> <a href="{{ route('app.fornecedor') }}"> Consulta </a> </li>
        </ul>

    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width="100%">

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>E-mail</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td> <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Exlcuir</a> </td>
                            <td> <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a> </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
                <div class="paginacao">
                    {{ $fornecedores->appends($request)->links()}} <br>
                    <!--Paginação de Registros-->
                    Exibindo {{$fornecedores->count()}} fornecedores de {{$fornecedores->total()}}
                    (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}})

                </div>
        </div>

    </div>
</div>