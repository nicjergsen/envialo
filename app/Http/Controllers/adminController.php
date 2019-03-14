<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Persona;
use App\Models\Empleado;

class adminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
