<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    use HasFactory;

    protected $table = 'materiales';
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_unitario',
        'existencia',
        'estado',
        'categoría',
        'cantidad_inicial',
        'stock_minimo',
        'ubicacion_almacen',
        'imagen'
    ];

    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('img/default-material.png');
    }

    public function scopeStockBajo($query)
    {
        return $query->whereRaw('existencia <= stock_minimo');
    }
}