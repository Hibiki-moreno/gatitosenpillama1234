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
        'estado'
    ];
    
    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class, 'especialidad_id');
    }
}