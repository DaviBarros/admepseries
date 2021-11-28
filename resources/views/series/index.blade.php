@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@include('mensagem', ['mensagem' => $mensagem])
@auth
<a href="{{ route('adicionarserie') }}" class="bt btn-primary btn-sm p-2">Adicionar</a>
@endauth

<ul class="list-group mt-3">
    @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>

            <span class="d-flex">
                @auth
                <button class="btn btn-info m-1 p-2" onclick="toggleInput({{ $serie->id }})">
                    Editar <i class="fas fa-edit ml-1"></i>
                </button>
                @endauth
                <a href="{{ route('temporadas.index', $serie->id) }}" class="btn btn-info m-1 p-2">
                    Temporadas <i class="fas fa-eye m-1"></i>
                </a>
                <form method="post" action="{{ route('excluirtemporada', $serie->id) }}">
                    @csrf
                    @method('DELETE')
                    @auth
                    <button class="btn btn-danger m-1 p-2">Excluir <i class="fas fa-trash ml-1"></i></button>
                    @endauth
                </form>
            </span>
        </li>
    @endforeach  
</ul>

<script>

    function toggleInput(serieId){
        const nomeSerieEl = document.getElementById(`nome-serie-${serieId}`);
        const inputSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
        if(nomeSerieEl.hasAttribute('hidden')){
            nomeSerieEl.removeAttribute('hidden');
            inputSerieEl.hidden = true;
        }else{
            inputSerieEl.removeAttribute('hidden');
            nomeSerieEl.hidden = true;
        }
        // document.getElementById(`input-nome-serie-${serieId}`).removeAttribute('hidden');
        // document.getElementById(`nome-serie-${serieId}`).hidden = true;
    }

    function editarSerie(serieId){
        let formData =  new FormData();
        const nome = document.querySelector(`#input-nome-serie-${serieId}> input`).value;
        
        const token = document.querySelector('input[name="_token"]').value;
        //alert(token);
        formData.append('nome', nome);
        formData.append('_token', token);
        
        const url = `/series/${serieId}/editaNome`;

        fetch(url, {body: formData, method: 'POST'})
        .then(() => {
            toggleInput(serieId);
            document.getElementById(`nome-serie-${serieId}`).textContent = nome;
        });
    }
</script>

@endsection