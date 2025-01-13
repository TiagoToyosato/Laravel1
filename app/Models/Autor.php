<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'estado'];

    public function scopeAtivos($query)
    {
        return $query->where('estado', 1);
    }

    public function livros()
    {
        return $this->hasMany(Livro::class, 'autor_id');
    }
}

