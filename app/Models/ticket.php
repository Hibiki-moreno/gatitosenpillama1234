<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{   
    public function index(){
        $tickets=ticket::all();
        return $tickets;
    }
     
}
