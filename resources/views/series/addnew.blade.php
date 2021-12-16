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
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control mt-1 mb-3" name="nome" id="nome" placeholder="Digite o nome da série aqui.">
        </div>
            <div class="d-flex align-items-center justify-content-between">
                <button class="btn btn-sm btn-outline-success fw-bold">
                    <i class="fas fa-check"></i>
                </button>
                <a href="{{route('listar_series')}}" class="btn btn-sm btn-outline-danger fw-bold">
                    <i class="fas fa-angle-double-left"></i>
                </a>
            </div>
        </div>
    </form>
@endsection