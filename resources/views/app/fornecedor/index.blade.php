<h3>Fornecedor</h3>
{{-- Isto é um comentário Blade @dd($fornecedores) --}}

@isset($fornecedores)

    @for ($i = 0; isset($fornecedores[$i]); $i++)
        <hr>
        Fornecedor: {{ $fornecedores[$i]['nome'] }} <br>
        Status: {{ $fornecedores[$i]['status'] }} <br>
        CNPJ: {{$fornecedores[$i] ['CNPJ']}} <br>
        Telefone: ({{$fornecedores[$i]['ddd'] ?? '' }}) {{$fornecedores[$i]['telefone'] ?? '' }} <br>

        @switch($fornecedores[$i]['ddd'])
            @case('11')
                São Paulo - SP
                @break
            @case('32')
                Juiz de Fora - MG            
                @break
            @case('85')
                Fortaleza - CE
                @break
            @default
                Local do DDD informado não foi encontrado            
        @endswitch
        <hr><br><br>

    @endfor

    

@endisset
