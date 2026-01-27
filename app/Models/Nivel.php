<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    protected $table = "niveles";
    protected $fillable = ['nombre'];

    public function grados()
    {
        return $this->hasMany(Grado::class);
    }

    public function matriculaciones()
    {
        return $this->hasMany(Matriculacion::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}
