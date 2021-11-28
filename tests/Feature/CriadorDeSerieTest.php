<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;

class CriadorDeSerieTest extends TestCase
{   
    
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testeCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeserie = 'Nome de teste';
        $serieCriada = $criadorDeSerie->criarSerie($nomeserie, 1, 1);
        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('temporadas', ['serie_id'=>$serieCriada->id, 'numero'=>1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);

    }
}
