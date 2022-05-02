{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>

    <select name="motivos_id" >
        <option value="">Qual o motivo do contato?</option>

        @foreach($motivos as $key => $motivo)
            <option value = "{{$motivo->id}}" {{old('motivos_id') == $motivo->id ? 'selected' : ''}}> {{$motivo->motivo}} </option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" >{{ (old('mensagem')!= '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }} </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

<div style="position: absolute; top: 8px; left: 8px; width: 51%; background: red">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>
