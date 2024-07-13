<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
