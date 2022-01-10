<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episódio;
use App\Models\Temporada;
use Illuminate\Http\Request;
use App\Serie;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagemRemocao = $request->session()->get('mensagemRemocao');
        return view('series.index', compact('series', 'mensagemRemocao'));
    }

    public function newseries(Request $request) {
        $mensagem = $request->session()->get('mensagem');

        return view('series.addnew', compact('mensagem'));
    }

    public function store(SeriesFormRequest $request) {
        $serie = Serie::create(['nome' => $request -> nome]);

        $temporadas = $request -> temporadas;
        $episodios = $request -> episodios;
        for ($i=1; $i <= $temporadas; $i++) { 
            $temporada = $serie -> temporadas() -> create(['numero' => $i]);

            for ($j=1; $j <= $episodios; $j++) { 
               $temporada -> episodios() -> create(['numero' => $j]);
            }
        }

        $request->session()->flash('mensagem',
            "A série {$serie->nome} foi adicionada com sucesso. Id: {$serie->id}.");
        return redirect()->route(route: 'form_criar_serie');
    }

    public function delete(Request $request){
        Serie::destroy($request->id);
        Temporada::destroy($request->id);
        Episódio::destroy($request->id);
        $request->session()->flash('mensagemRemocao',
            "A série foi removida com sucesso.");
        return redirect()->route(route: 'listar_series');
    }
}