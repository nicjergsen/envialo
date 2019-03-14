<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Usuario;
use App\Models\Persona;
use App\Models\Tipousuario;
use App\Models\Sucursal;
use Rut;

class empleadoController extends Controller
{
    public function index(Request $request)
    {
        $campo = $request->get('campo');
        $valor = $request->get('valor');
        if ($campo == "idTipusu") {
            $tipo = Tipousuario::where("nombre", "like", "%$valor%")->first();
            if (count($tipo) != 0) {
                $valor = $tipo->idTipusu;
                $empleados = Empleado::buscar($campo, $valor)->where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);
                if (count($empleados) == 0) {
                    session()->flash('error', 'Por favor sea más especifico');
                    return view('empleados.index', compact('empleados'));
                } else {
                    return view('empleados.index', compact('empleados'));
                }
            } else {
                $empleados = Empleado::where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);
                session()->flash('error', 'Sin coincidencias');
                return view('empleados.index', compact('empleados'));
            }
        } else if ($campo == "idSuc") {
            $sucursal = Sucursal::where("nombreSuc", "like", "%$valor%")->first();
            if (count($sucursal) != 0) {
                $valor = $sucursal->idSuc;
                $empleados = Empleado::buscar($campo, $valor)->where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);
                if (count($empleados) == 0) {
                    session()->flash('error', 'Por favor sea más especifico');
                    return view('empleados.index', compact('empleados'));
                } else {
                    return view('empleados.index', compact('empleados'));
                }
            } else {
                $empleados = Empleado::where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);
                session()->flash('error', 'Sin coincidencias');
                return view('empleados.index', compact('empleados'));
            }
        } else {
            /* if($valor != null){
                $valor = Rut::parse($valor)->normalize();
            } */
            $empleados = Empleado::buscar($campo, $valor)->where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);
            if(count($empleados)==null){
                session()->flash('error', 'Sin coincidencias');
                $empleados = Empleado::where("idTipusu", "!=", "1")->where("rut", "!=", session('rutUsuario'))->orderBy('isActive', 'desc')->paginate(5);

            }
            return view('empleados.index', compact('empleados'));
        }
    }
    public function create()
    {
        $roles = Tipousuario::where("idTipusu", "!=", "1")->get();
        $sucursales = Sucursal::where("isActive", "!=", "0")->get();
        return view('empleados.create', compact('roles', 'sucursales'));
    }
    public function store()
    {
        $data = request()->validate([
            'nombreUsu' => 'required|alpha',
            'apellidoUsu' => 'required|alpha',
            'telefonoUsu' => 'required|digits:8',
            'emailUsu' => "required|email",
            'direccionUsu' => 'required',
            'username' => "required|alpha_dash",
            'rut' => "required|unique:Empleado,rut|cl_rut",
            'pass' => 'required',
            'idTipusu' => 'required',
            'idSuc' => 'required',
        ], [
            'nombreUsu.required' => 'El campo nombre es obligatorio',
            'nombreUsu.alpha' => 'Por favor ingrese un nombre válido',
            'apellidoUsu.required' => 'El campo apellido es obligatorio',
            'apellidoUsu.alpha' => 'Por favor ingrese un apellido válido',
            'telefonoUsu.required' => 'El telefono es obligatorio',
            'telefonoUsu.digits' => 'Ingrese un numero de telefono válido',
            'emailUsu.required' => 'El email es obligatorio',
            'emailUsu.unique' => 'El email ingresado ya existe',
            'emailUsu.email' => 'Ingrese un correo válido',
            'direccionUsu.required' => 'El campo direccion es obligatorio',
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.unique' => 'El nombre de usuario ya existe, por favor elija otro',
            'username.alpha_dash' => 'Ingrese un nombre de usuario válido',
            'rut.required' => 'El campo rut es obligatorio',
            'rut.unique' => 'El rut ingresado ya existe',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'pass.required' => 'Ingrese una contraseña',
            'idTipusu.required' => 'El campo tipo de usuario es obligatorio',
            'idSuc' => 'El campo Sucursal es obligatorio',
        ]);
        $persona = Persona::find(Rut::parse($data['rut'])->normalize());
        $usuario = Usuario::find(Rut::parse($data['rut'])->normalize());
        $empleado = Empleado::find(Rut::parse($data['rut'])->normalize());
        if (is_null($persona)) {
            Persona::firstOrCreate([
                'rut' => Rut::parse($data['rut'])->normalize(),
                "nombreUsu" => $data['nombreUsu'],
                'apellidoUsu' => $data['apellidoUsu'],
                'telefonoUsu' => $data['telefonoUsu'],
                'emailUsu' => $data['emailUsu'],
                'direccionUsu' => $data['direccionUsu']
            ]);
        }
        if (is_null($usuario)) {
            Usuario::firstOrCreate([
                'rut' => Rut::parse($data['rut'])->normalize(),
                'username' => $data['username'],
                'pass' => sha1($data['pass'])
            ]);
        }
        if (is_null($empleado)) {
            Empleado::firstOrCreate([
                'rut' => Rut::parse($data['rut'])->normalize(),
                'idTipusu' => $data['idTipusu'],
                'idSuc' => $data['idSuc'],
                'isActive' => '1'

            ]);
        }

        return redirect()->action('empleadoController@index')->with('mensaje', 'Empleado registrado con éxito');
    }
    public function show($rut)
    {
        $empleado = Empleado::findOrFail($rut);
        return view('empleados.show', compact('empleado'));
    }
    public function edit($rut)
    {
        $roles = Tipousuario::where("idTipusu", "!=", "1")->get();
        $sucursales = Sucursal::where("isActive", "!=", "0")->get();
        $empleado = Empleado::find($rut);
        return view('empleados.edit', compact('roles', 'sucursales', 'empleado'));
    }
    public function update(Empleado $empleado)
    {
        $data = request()->validate([
            'nombreUsu' => 'required|alpha|sometimes',
            'apellidoUsu' => 'required|alpha|sometimes',
            'telefonoUsu' => 'required|digits:8|sometimes',
            'emailUsu' => "required|unique:Persona,emailUsu,$empleado->rut,rut|email|sometimes",
            'direccionUsu' => 'required|sometimes',
            'username' => "required|unique:Usuario,username,$empleado->rut,rut|alpha_dash|sometimes",
            'rut' => "required|unique:Empleado,rut,$empleado->rut,rut|cl_rut|sometimes",
            'pass' => 'required|sometimes',
            'idTipusu' => 'required|sometimes',
            'idSuc' => 'required|sometimes',
            'isActive' => 'sometimes',
        ], [
            'nombreUsu.required' => 'El campo nombre es obligatorio',
            'nombreUsu.alpha' => 'Por favor ingrese un nombre válido',
            'apellidoUsu.required' => 'El campo apellido es obligatorio',
            'apellidoUsu.alpha' => 'Por favor ingrese un apellido válido',
            'telefonoUsu.required' => 'El telefono es obligatorio',
            'telefonoUsu.digits' => 'Ingrese un numero de telefono válido',
            'emailUsu.required' => 'El email es obligatorio',
            'emailUsu.unique' => 'El email ingresado ya existe',
            'emailUsu.email' => 'Ingrese un correo válido',
            'direccionUsu.required' => 'El campo direccion es obligatorio',
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.unique' => 'El nombre de usuario ya existe, por favor elija otro',
            'username.alpha_dash' => 'Ingrese un nombre de usuario válido',
            'rut.required' => 'El campo rut es obligatorio',
            'rut.unique' => 'El rut ingresado ya existe',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'pass.required' => 'Ingrese una contraseña',
            'idTipusu.required' => 'El campo tipo de usuario es obligatorio',
            'idSuc' => 'El campo Sucursal es obligatorio',
        ]);
        $empleado->update($data);
        $usuario = Usuario::find($empleado->rut);
        if(isset($data['pass'])){
            if (strlen($data['pass']) != 40)
                $data['pass'] = sha1($data['pass']);
        }
        $usuario->update($data);
        $persona = Persona::find($empleado->rut);
        $persona->update($data);
        return redirect()->action('empleadoController@show', [$empleado->rut])->with('Datos actualizados');
    }
    public function delete($rut)
    {
        $empleado = Empleado::find($rut);
        return view('empleados.delete', compact('empleado'));
    }
}
