<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'equipos';
 

    protected $fillable = [
        'modelo',
        'marca',
        'ano',
        'condicion_fisica',
        'color'
    ];
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
