@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')

    <ul class="list-group mt-3" id="lista" name="lista">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('temporadaepisodio', $temporada->id) }}"> 
                    Temporada {{ $temporada->numero }}
                </a>
                <span class="badge badge-secondary">

                    {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach   
    </ul>
@endsection
