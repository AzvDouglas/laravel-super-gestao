<h3>Fornecedor</h3>
{{-- Isto é um comentário Blade @dd($fornecedores) --}}

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }} <br>
    Status: {{ $fornecedores[0]['status'] }} <br>
    @isset($fornecedores[0] ['CNPJ'])
        CNPJ: {{$fornecedores[0] ['CNPJ']}}
        @empty($fornecedores[0] ['CNPJ'])
            >-Vazio
        @endempty
    @endisset
@endisset
