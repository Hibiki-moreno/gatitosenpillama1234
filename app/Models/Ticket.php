<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'problema', 'diagnostico', 'cliente_id', 'equipo_id',
        'metodo_pago', 'total', 'tipo_reparacion', 'estado',
        'fecha_ingreso', 'fecha_salida', 'prioridad'
    ];
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    
    public function equipo()
    {
        return $this->belongsTo(Equipo::class);
    }
}