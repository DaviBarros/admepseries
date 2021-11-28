<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{   
    
    public function index(Request $request)
    {
        //echo $request->url(); exit();
        // $series = ['Lost', 'Agents of Shield'];
        // $html = "<ul>";
        //     foreach ($series as $serie) {
        //         $html .= "<li>$serie</li>";
        //     }
        // $html .= "</ul>";

        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');


        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request, CriadorDeSerie $criadorDeSerie)
    {
        try {
            $serie = $criadorDeSerie->criarSerie($request->nomeserie, $request->numerotemporadas, $request->numeroepisodios);

            $request->session()->flash("mensagem", "Série {$serie->nome} com suas temporadas e episódios criada com sucesso!");

            return redirect('/series');
            exit();
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage() . "\n";
            echo "Linha de erro: " . $e->getLine();
        }
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {

        try {
            
            $nomeSerie = $removedorDeSerie->removerSerie($request->id);
            //Serie::destroy($request->id);

            $request->session()->flash("mensagem", "Série $nomeSerie excluída com sucesso!");

            return redirect('/series');
            exit();
        } catch (Exception $e) {

            echo "Erro: " . $e->getMessage() . "\n";
            echo "Linha: " . $e->getLine();
        }
    }

    public function editaNome(int $id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
