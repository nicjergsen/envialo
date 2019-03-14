<?php

namespace App\Http\Controllers;

use App\Models\Tipousuario;
use Illuminate\Http\Request;


class rolesController extends Controller
{
    public function index()
    {
        $roles = Tipousuario::where("idTipusu", "!=", "1")->get();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        return view('roles.create');
    }
    public function store()
    {
        $data = request()->all();
        Tipousuario::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion']
        ]);

        return redirect()->action('rolesController@index');
    }
    public function edit($id)
    {
        $rol = Tipousuario::find($id);
        return view('roles.edit', compact('rol'));
    }
    public function update(Tipousuario $rol)
    {
        $rol->update(request()->all());
        return redirect()->action('rolesController@index');
    }
    public function show($id)
    {
        $rol = Tipousuario::findOrFail($id);
        return view('roles.show', compact('rol'));
    }
}
