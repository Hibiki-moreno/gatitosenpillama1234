<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparador extends Model
{
    use HasFactory;

    protected $table = 'reparadores';
    
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'correo',
        'celular',
        'especialidad_id',
        'anios_experiencia',
        'turno',
        'estado',
        'imagen'
    ];

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('img/default-reparador.png');
    }
}