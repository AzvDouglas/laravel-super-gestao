{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>

        @foreach()
            <option> </option>
        @endforeach

         Mais simples, sem old ou consulta ao BD
        <option value="1" {{old(motivo) == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{old(motivo) == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{old(motivo) == 3 ? 'selected' : '' }}>Reclamação</option>

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
