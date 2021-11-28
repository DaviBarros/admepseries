<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Tests\TestCase;

class RemovedorDeSerieTest extends TestCase
{
    /** @var Serie */
    private $serie;
   
    public function setUp():void{

        parent::setUp();
        $criadorDeSerie = new CriadorDeSerie();
        $this->serie = $criadorDeSerie->criarSerie('Nome da série', 1, 1);
    }

    /** @test */
    public function removerUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id'=> $this->serie->id]);
        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serie->id);
        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome da série', $this->serie->nome);
        $this->assertDatabaseMissing('series', ['id'=> $this->serie->id]);
       
    }
}
