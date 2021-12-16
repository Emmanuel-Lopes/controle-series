<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
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
        $serie = Serie::create($request->all());
        $request->session()->flash('mensagem',
            "A série {$serie->nome} foi adicionada com sucesso. Id: {$serie->id}.");
        return redirect()->route(route: 'form_criar_serie');
    }

    public function delete(Request $request){
        Serie::destroy($request->id);
        $request->session()->flash('mensagemRemocao',
            "A série foi removida com sucesso.");
        return redirect()->route(route: 'listar_serie');
    }
}