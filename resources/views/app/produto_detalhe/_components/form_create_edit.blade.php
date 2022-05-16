@if(isset($produto_detalhe->id))
    <form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('produto-detalhe.store') }}">
        @csrf
@endif
    <input type="text" name="product_id" value="{{ $produto_detalhe->product_id ?? old('product_id') }}" placeholder="ID do Produto" class="borda-preta" style="margin-top: 30px">
    {{ $errors->has('product_id') ? $errors->first('product_id') : '' }}

    <input type="text" name="length" value="{{ $produto_detalhe->length ?? old('length') }}" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('length') ? $errors->first('length') : '' }}

    <input type="text" name="width" value="{{ $produto_detalhe->width ?? old('width') }}"  placeholder="Largura" class="borda-preta">
    {{ $errors->has('width') ? $errors->first('width') : '' }}

    <input type="text" name="height" value="{{ $produto_detalhe->height ?? old('height') }}"  placeholder="Altura" class="borda-preta">
    {{ $errors->has('height') ? $errors->first('height') : '' }}

    <select name="unit_id">
        <option>-- Selecione a Unidade de Medida --</option>
        @foreach($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ($produto_detalhe->unit_id ?? old('unit_id')) == $unidade->id ? 'selected' : '' }} >{{ $unidade->description }}</option>
        @endforeach
    </select>
    {{ $errors->has('unit_id') ? $errors->first('unit_id') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
<form>
