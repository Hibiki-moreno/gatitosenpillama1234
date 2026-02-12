<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    // Esto permite que el controlador guarde los datos en estas columnas
    protected $fillable = [
        'ticket_id',
        'ruta',
        'descripcion',
        'fecha',
        'reparador_id'
    ];

    // Relación inversa (opcional, pero útil)
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}