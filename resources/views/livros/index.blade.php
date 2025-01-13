@extends('layouts.app')

@section('title', 'Lista de Livros')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Lista de Livros</h1>
    <a href="{{ route('livros.create') }}" class="btn btn-primary">Adicionar Livro</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Data de Publicação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($livros as $livro)
            <tr>
                <td>{{ $livro->id }}</td>
                <td>{{ $livro->titulo }}</td>
                <td>{{ $livro->autor->nome }}</td>
                <td>{{ $livro->data_publicacao->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('livros.edit', $livro) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('livros.destroy', $livro) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum livro encontrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $livros->links() }}
</div>
@endsection
