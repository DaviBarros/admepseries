@extends('layout')

@section('cabecalho')
Adicionar série  
@endsection

@section('conteudo')

<form action="{{ route('salvarserie') }}" method="post">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nomeserie">Nome da série</label>
            <input type="text" class="form-control" id="nomeserie" name="nomeserie" aria-describedby="nomeserie" placeholder="Digite aqui o nome da série" required minlength="3">       
        </div>  
        <div class="col col-2">
            <label for="numerotemporadas">Temporadas</label>
            <input type="number" class="form-control" id="numerotemporadas" name="numerotemporadas" aria-describedby="numerotemporadas" placeholder="Nº temporadas" required minlength="1">       
        </div>    
        <div class="col col-2">
            <label for="numeroepisodios">Episódios</label>
            <input type="number" class="form-control" id="numeroepisodios" name="numeroepisodios" aria-describedby="numeroepisodios" placeholder="Nº episódios" required minlength="1">       
        </div>     
    </div>      
    
    <button type="submit" class="btn btn-primary mt-2">Salvar</button>
</form>
@endsection