<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Exception;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request){

        try {                 
            $episodios = $temporada->episodios;
            //$temporadaId= $temporada->id;
            $mensagem = $request->session()->get('mensagem');       
            return view('episodios.index',
                compact('episodios','temporada','mensagem')
            );            
        }catch (Exception $e){
            echo "Erro: " . $e->getMessage();
            echo "Linha: " . $e->getLine();
        }
        

    }

    public function assistir(Temporada $temporada, Request $request){
        
        if(!is_array($request->episodios) || empty($request->episodios)){
            $episodiosAssistidos = [];
        }else{
            $episodiosAssistidos = array_keys($request->episodios);
        }

        
        //$episodiosAssistidos = array_keys($request->episodios);
        $temporada->episodios->each(function (Episodio $episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array(
                $episodio->id,
                $episodiosAssistidos
            );
        });
        $temporada->push();
        $request->session()->flash('mensagem','Episódios marcados como assistidos.');

        //return redirect('/temporadas/' . $temporada->id . '/episodios');
        //header("Location:/temporadas/' . $temporada->id . '/episodios");
        return redirect()->back();
    }
}
