<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Comuna;
use Illuminate\Http\Request;


class sucursalController extends Controller
{
    public function index(Request $request)
    {
        $campo = $request->get('campo');
        $valor = $request->get('valor');
        if ($campo == "idComuna") {
            $comuna = Comuna::where("nombreComuna", "like", "%$valor%")->first();
            if (count($comuna) != 0) {
                $valor = $comuna->idComuna;
                $sucursales = Sucursal::buscar($campo, $valor)->orderBy('isActive', 'desc')->paginate(10);
                if (count($sucursales) == 0) {
                    session()->flash('error', 'Por favor sea más especifico');
                    return view('sucursales.index', compact('sucursales'));
                } else {
                    return view('sucursales.index', compact('sucursales'));
                }
            } else {
                $sucursales = Sucursal::orderBy('isActive', 'desc')->paginate(10);
                return view('sucursales.index', compact('sucursales'));
            }
        } else {
            $sucursales = Sucursal::buscar($campo, $valor)->orderBy('isActive', 'desc')->paginate(10);
            if(count($sucursales)==null){
                session()->flash('error', 'Sin coincidencias');
                $sucursales = Sucursal::orderBy('isActive', 'desc')->paginate(10);

            }
            return view('sucursales.index', compact('sucursales'));
        }
    }
    public function create()
    {
        $comunas = Comuna::orderBy('nombreComuna', 'asc')->get();
        return view('sucursales.create', compact('comunas'));
    }
    public function store()
    {
        $data = request()->validate([
            'nombreSuc' => 'required',
            'comuna' => 'required',
            'direccionSuc' => 'required',
            'telefonoSuc' => 'required|digits:8',
            'emailContactoSuc' => 'required|unique:Sucursal|email',
            'aperturaSuc' => 'required',
            'cierreSuc' => 'required',
            'googleMapsSuc' => 'required',
        ], [
            'nombreSuc.required' => 'El campo nombre es obligatorio',
            'comuna.required' => 'La comuna es obligatoria',
            'direccionSuc.required' => 'El campo direccion es obligatorio',
            'telefonoSuc.required' => 'El telefono es obligatorio',
            'telefonoSuc.digits' => 'Ingrese un numero de telefono válido',
            'emailContactoSuc.required' => 'El email es obligatorio',
            'emailContactoSuc.unique' => 'El email ingresado ya existe',
            'emailContactoSuc.email' => 'Ingrese un correo válido',
            'aperturaSuc.required' => 'El campo apertura es oblogatorio',
            'cierreSuc.required' => 'El campo cierre es obligatorio',
            'googleMapsSuc' => 'El link de google maps es obligatorio',
        ]);
        Sucursal::create([
            'idComuna' => $data['comuna'],
            'nombreSuc' => $data['nombreSuc'],
            'direccionSuc' => $data['direccionSuc'],
            'aperturaSuc' => $data['aperturaSuc'],
            'cierreSuc' => $data['cierreSuc'],
            'telefonoSuc' => $data['telefonoSuc'],
            'emailContactoSuc' => $data['emailContactoSuc'],
            'googleMapsSuc' => $data['googleMapsSuc'],
            'isActive' => '1'
        ]);

        return redirect()->action('sucursalController@index')->with('mensaje', 'Sucursal registrada con éxito');
    }
    public function show($id)
    {
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.show', compact('sucursal'))->with('mensaje' . 'Datos actualizados');
    }
    public function edit($id)
    {
        $comunas = Comuna::orderBy('nombreComuna', 'asc')->get();
        $sucursal = Sucursal::find($id);
        return view('sucursales.edit', compact('sucursal', 'comunas'));
    }
    public function update(Sucursal $sucursal)
    {
        $data = request()->validate([
            'idSuc' => 'sometimes',
            'nombreSuc' => 'required|sometimes',
            'idComuna' => 'required|sometimes',
            'direccionSuc' => 'required|sometimes',
            'telefonoSuc' => 'required|digits:8|sometimes',
            'emailContactoSuc' => "required|unique:Sucursal,emailContactoSuc,$sucursal->idSuc,idSuc|email|sometimes",
            'aperturaSuc' => 'required|sometimes',
            'cierreSuc' => 'required|sometimes',
            'isActive' => 'sometimes',
        ], [
            'nombreSuc.required' => 'El campo nombre es obligatorio',
            'idComuna.required' => 'La comuna es obligatoria',
            'direccionSuc.required' => 'El campo direccion es obligatorio',
            'telefonoSuc.required' => 'El telefono es obligatorio',
            'telefonoSuc.digits' => 'Ingrese un numero de telefono válido',
            'emailContactoSuc.required' => 'El email es obligatorio',
            'emailContactoSuc.unique' => 'El email ingresado ya existe',
            'emailContactoSuc.email' => 'Ingrese un correo válido',
            'aperturaSuc.required' => 'El campo apertura es oblogatorio',
            'cierreSuc.required' => 'El campo cierre es obligatorio',
        ]);

        $sucursal->update($data);
        return redirect()->action('sucursalController@show', [$sucursal->idSuc])->with('mensaje' . 'Datos actualizados');
    }

    public function delete($id)
    {
        $sucursal = Sucursal::find($id);
        return view('sucursales.delete', compact('sucursal'));
    }

    public function branch()
    {
        $sucursales = Sucursal::where("isActive", "=", "1")->get();
        return view('branch', compact('sucursales'));
    }
}
