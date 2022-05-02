{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    @if($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    {{ $errors->has('email') ? $errors->first('email') : '' }}

    <br>

    <select name="motivos_id" >
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivos as $key => $motivo)
            <option value = "{{$motivo->id}}" {{old('motivos_id') == $motivo->id ? 'selected' : ''}}> {{$motivo->motivo}} </option>
        @endforeach
    </select>
    {{ $errors->has('motivos_id') ? $errors->first('motivos_id') : '' }}
    <br>
    <textarea name="mensagem" >{{ (old('mensagem')!= '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }} </textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

@if($errors->any())
    <div style="position: absolute; top: 8px; left: 8px; width: 100%; background: red">

        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach

    </div>
@endif
