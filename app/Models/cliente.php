<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $table = 'cliente';
    
    // 👇 AGREGAMOS 'imagen' A fillable
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'celular',
        'correo',
        'direccion',
        'estado',
        'imagen'  // ✅ CAMPO NUEVO PARA LA IMAGEN
    ];
    
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    
    // 👇 ACCESOR para obtener URL completa de la imagen
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('img/default-user.png');
    }
}