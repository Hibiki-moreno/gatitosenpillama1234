<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    use HasFactory;
    
    protected $table = 'evidencias';
    
    protected $fillable = [
        'ticket_id',
        'descripcion',
        'imagen',
        'fecha',
        'tecnico_id'
    ];
    
    protected $casts = [
        'fecha' => 'date'
    ];
    
    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
    
    public function tecnico()
    {
        return $this->belongsTo(Reparador::class, 'tecnico_id');
    }
}