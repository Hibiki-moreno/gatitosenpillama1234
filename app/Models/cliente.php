<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    public function index(){
        $clients = cliente::all();
        return($clients);
    }
}
