<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'cliente_id',
        'equipo_id',
        'problema',
        'diagnostico',
        'tipo_reparacion',
        'prioridad',
        'estado',
        'metodo_pago',
        'total',
        'fecha_ingreso',
        'fecha_salida'
    ];

         public function cliente()  
    {
        // 'cliente_id' es la FK en tickets, 'id' es PK en clientes
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');

    }

    public function Materials(){
        return $this -> belongsToMany(Materiales::class, 'ticket_material', 'material_id', 'ticket_id');
    }   

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }

   public function evidencias(): HasMany{
    return $this->hasMany(Evidencia::class, 'ticket_id');
}


  
}
