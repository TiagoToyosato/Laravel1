@extends('layouts.app')

@section('title', 'Adicionar Livro')

@section('content')
<div class="container">
    <h1>Adicionar Livro</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="4" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_publicacao" class="form-label">Data de Publicação</label>
            <input type="date" name="data_publicacao" id="data_publicacao" class="form-control" value="{{ old('data_publicacao') }}" required>
        </div>

        <div class="mb-3">
            <label for="autor_id" class="form-label">Autor</label>
            <select name="autor_id" id="autor_id" class="form-select" required>
                <option value="" disabled selected>Selecione um autor</option>
                @foreach($autores as $id => $nome)
                    <option value="{{ $id }}" {{ old('autor_id') == $id ? 'selected' : '' }}>
                        {{ $nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
