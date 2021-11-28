<?php

namespace App\Http\Controllers;

use App\Serie;
use Exception;

class TemporadasController extends Controller
{
    public function index(int $serieId){
        try{
            $serie = Serie::find($serieId);
            $temporadas = $serie->temporadas;
            return view('temporadas.index', compact('serie','temporadas'));
        }catch(Exception $e){
           echo "Erro: " . $e->getMessage() ."<br />";
           echo "Line " .  $e->getLine();
        }
        
    }
}
