@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
    @include('mensagem', ['mensagem' => $mensagem])
<form action="{{ route('assistir', $temporada->id) }}"  method="post">
    @csrf
    <ul class="list-group mt-3">
        @foreach ($episodios as $episodio)
            <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{ $episodio->numero }}
            <input type="checkbox"  name="episodios[{{ $episodio->id }}][assistido]"{{ $episodio->assistido ? 'checked' : '' }}/>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2">Salvar</button>
    
    <a href="{{ route('temporadas.index', $temporada->serie->id) }}" class="btn btn-primary mt-2">Voltar</a>
</form>

@endsection


