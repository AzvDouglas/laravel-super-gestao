@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
@endif

    <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="telefone" value="{{ $cliente->telefone ?? old('telefone') }}" placeholder="Telefone" class="borda-preta">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}

    <input type="text" name="email" value="{{ $cliente->email ?? old('email') }}" placeholder="Email" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : '' }}


    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
