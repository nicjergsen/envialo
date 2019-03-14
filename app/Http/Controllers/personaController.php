<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Seguimiento;
use App\Models\Encomienda;
use Rut;

class personaController extends Controller
{
    public function create()
    {
        return view('personas.create');
    }
    public function store()
    {
        $data = request()->all();
        Persona::create([
            'rut' => $data['rut'],
            'nombreUsu' => $data['nombreUsu'],
            'apellidoUsu' => $data['apellidoUsu'],
            'telefonoUsu' => $data['telefonoUsu'],
            'emailUsu' => $data['emailUsu'],
            'direccionUsu' => $data['direccionUsu']
        ]);

        return redirect('/');
    }
    public function edit()
    {
        $persona = Persona::find(session('rutUsuario'));
        return view('usuarios.personal', compact('persona'));
    }
    public function update(Persona $persona)
    {
        $persona = Persona::find(session('rutUsuario'));
        $data = request()->validate([
            'telefonoUsu' => 'sometimes|digits:8',
            'emailUsu' => "sometimes|unique:Persona,emailUsu,$persona->rut,rut|email",
            'direccionUsu' => 'sometimes|string'
        ], [
            'telefonoUsu.digits' => 'Ingrese un numero de telefono válido',
            'emailUsu.unique' => 'El email ingresado ya existe',
            'emailUsu.email' => 'Ingrese un correo válido',
            'direccionUsu.string' => 'La direccion debe contener una cadena de texto',
        ]);

        $persona->update($data);
        return redirect('/personal')->with('mensaje', 'Datos personales actualizados');
    }
    public function tracking()
    {
        $data = request()->all();
        $datos_encomienda = Seguimiento::where("trackingSeg", "=", $data['trackingSeg'])->first();
        if (count($datos_encomienda) == 0)
            return redirect('/')->with('mensaje', 'Numero de seguimiento Invalido');
        $tracking = Seguimiento::where("isAnulado", "!=", "1")->where("trackingSeg", "=", $data['trackingSeg'])->get();
        if (count($tracking) == 0)
            return redirect('/')->with('error', 'Numero de seguimiento Invalido');
        return view('tracking', compact('tracking', 'datos_encomienda'));
    }
    public function buscar($rut)
    {
        try {
            $rut = Rut::parse($rut)->normalize();
            $persona = Persona::find($rut);
            if (count($persona) != 0) {
                echo json_encode($persona);
            }
        } catch(Exception $e) {
            return redirect('/recepcionista/create2')->with('mensaje', 'No hay registros asociados a ese rut');
        }
    }


}
