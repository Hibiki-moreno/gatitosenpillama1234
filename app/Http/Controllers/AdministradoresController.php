<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrador;

class AdministradoresController extends Controller
{
    //
    public function index()
    {
        $admis=Administrador::all();//select * from administradores
        return view('/administradores/listado');
    }
}
