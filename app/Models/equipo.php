<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';
    
    protected $fillable = [
        'modelo',
        'marca',
        'ano',
        'condicion_fisica',
        'color'
    ];

    // Relación: Un equipo tiene 3 imágenes
    public function imagenes()
    {
        return $this->hasMany(EquipoImagen::class)->orderBy('orden');
    }

    // Obtener primera imagen (principal)
    public function getImagenPrincipalAttribute()
    {
        return $this->imagenes->first()->imagen_url ?? null;
    }
}