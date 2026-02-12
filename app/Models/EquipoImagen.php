<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoImagen extends Model
{
    use HasFactory;

    protected $table = 'equipo_imagenes';
    
    protected $fillable = [
        'equipo_id',
        'imagen',
        'orden'
    ];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }

    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }
}