<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_publicacao',
        'autor_id',
    ];

    protected $casts = [
        'data_publicacao' => 'date',
    ];

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
