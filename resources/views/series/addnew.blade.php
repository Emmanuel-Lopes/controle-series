@extends('layout')

@section('cabecalho')
    Adicionar Nova Série
@endsection

@section('conteudo')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="border rounded-3 border-dark container p-3" method="post">
        @csrf
        @if(!empty($mensagem))
            <div class="alert alert-success mt-3">
                {{$mensagem}}
            </div>
        @endif
        <div class="row">
            <div class="col col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control mt-1 mb-3" name="nome" id="nome" placeholder="Digite o nome da série aqui.">
            </div>
            <div class="col col-2">
                <label for="temporadas">Temporadas</label>
                <input type="number" class="form-control mt-1 mb-3" name="temporadas" id="temporadas" placeholder="Digite o número de temporadas aqui.">
            </div>
            <div class="col col-2">
                <label for="episodios">Episódios</label>
                <input type="number" class="form-control mt-1 mb-3" name="episodios" id="episodios" placeholder="Digite o número de episódios aqui.">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <button class="btn btn-sm btn-outline-success fw-bold">
                <i class="fas fa-check"></i>
            </button>
            <a href="{{route('listar_series')}}" class="btn btn-sm btn-outline-danger fw-bold">
                <i class="fas fa-angle-double-left"></i>
            </a>
        </div>
    </form>
@endsection