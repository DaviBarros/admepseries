<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epPorTemporada):Serie{
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie]);
        $this->criaTemporadas($qtdTemporadas, $epPorTemporada, $serie);
        DB::commit();
        return $serie;
    }
    
        // $serie = Serie::create(['nome' => $nomeSerie]);
        // $qtdtemporadas = $numerotemporada;

        // for ($i = 1; $i <= $qtdtemporadas; $i++) {
        //     $temporada = $serie->temporadas()->create(['numero' => $i]);

        //     for ($j = 1; $j <= $numeroepisodios; $j++) {
        //         $temporada->episodios()->create(['numero' => $j]);
        //     }
        // }

        // return $serie;
        
        private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie):void{
            for($i = 1; $i <= $qtdTemporadas; $i++){
                $temporada = $serie->temporadas()->create(['numero' => $i]);
                $this->criaEpisodios($epPorTemporada, $temporada);
            }
        }

        private function criaEpisodios(int $epPorTemporada, \Illuminate\Database\Eloquent\Model $temporada):void{
            for($j = 1; $j <= $epPorTemporada; $j++){
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

}

