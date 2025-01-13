@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Livro</h1>

    <div class="mb-3">
        <strong>Título:</strong> {{ $livro->titulo }}
    </div>

    <div class="mb-3">
        <strong>Descrição:</strong> {{ $livro->descricao }}
    </div>

    <div class="mb-3">
        <strong>Data de Publicação:</strong> {{ $livro->data_publicacao }}
    </div>

    <div class="mb-3">
        <strong>Autor:</strong> {{ $livro->autor->nome }}
    </div>

    <a href="{{ route('livros.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
