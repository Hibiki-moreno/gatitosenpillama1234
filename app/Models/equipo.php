<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class equipo extends Model
{
    protected $table = 'equipos';
  public function index()
    {
   
 
       $devices = Equipo::all();
        
        return $devices;
    }
}
