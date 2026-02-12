<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $timestamps = false;
    protected $table = 'cliente';
    

    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'celular',
        'correo',
        'direccion',
        'estado'
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
