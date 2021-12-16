@extends('layout') 

@section('cabecalho')
    Séries Assistidas
@endsection

@section('conteudo')
    @if(!empty($mensagemRemocao))
        <div class="alert alert-success mt-3">
            {{$mensagemRemocao}}
        </div>
    @endif
    <a href="{{route('form_criar_serie')}}" type="button" class="btn btn-sm btn-outline-success mb-4 fw-bold">
        <i class="fas fa-plus"></i>
    </a>
    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item justify-content-between d-flex align-items-center border border-dark rounded-3 fw-normal mb-2">
                {{$serie -> nome}}
                <form class="" action="/series/remover/{{$serie->id}}" method="post"
                onsubmit="return confirm('Remover {{addslashes($serie->nome)}}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection