<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Autor;
use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('autor')->paginate(10);
        return view('livros.index', compact('livros'));
    }

    public function create()
    {
        $autores = Autor::ativos()->pluck('nome', 'id');
        return view('livros.create', compact('autores'));
    }

    public function store(Request $request)
    {
        $data = $this->validateLivro($request);
        Livro::create($data);

        return redirect()->route('livros.index')->with('success', 'Livro criado com sucesso!');
    }

    public function edit(Livro $livro)
    {
        $autores = Autor::ativos()->pluck('nome', 'id');
        return view('livros.edit', compact('livro', 'autores'));
    }

    public function update(Request $request, Livro $livro)
    {
        $data = $this->validateLivro($request);
        $livro->update($data);

        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }

    /**
     * Validação para criar/atualizar livros.
     */
    private function validateLivro(Request $request)
    {
        return $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'data_publicacao' => 'required|date',
            'autor_id' => 'required|exists:autors,id',
        ]);
    }
}
