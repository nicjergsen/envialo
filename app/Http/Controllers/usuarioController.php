<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Empleado;
use App\Models\Detalle;
use App\Models\Encomienda;
use App\Models\Persona;
use Rut;

class usuarioController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function register2()
    {
        return view('register2');
    }
    public function store()
    {
        $data = request()->validate([
            'username' => 'required|unique:Usuario|alpha_dash',
            'rut' => 'required|unique:Usuario|cl_rut',
            'pass' => 'required|same:confirmpassword',
            'confirmpassword' => 'required',
        ], [
            'username.required' => 'El nombre de usuario es obligatorio',
            'username.unique' => 'El nombre de usuario ya existe, por favor elija otro',
            'username.alpha_dash' => 'Ingrese un nombre de usuario válido',
            'rut.required' => 'El campo rut es obligatorio',
            'rut.unique' => 'El rut ingresado ya existe',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'pass.required' => 'Ingrese una contraseña',
            'pass.same' => 'La contraseña no coincide',
            'confirmpassword.required' => 'Ingrese de nuevo su contraseña'
        ]);
        $persona = Persona::find($data['rut']);
        if (count($persona) == 0) {
            return redirect('/login')->with('error', 'El rut ingresado no figura en nuestros registros de envíos, por favor use el otro módulo de registro');
        } else {
            Usuario::create([
                'rut' => Rut::parse($data['rut'])->normalize(),
                'username' => $data['username'],
                'pass' => sha1($data['pass'])
            ]);
            return redirect('/login')->with('mensaje', 'Bienvenido a Envialo!');
        }
    }
    public function store2()
    {
        $data = request()->validate([
            'nombreUsu' => 'required|alpha',
            'apellidoUsu' => 'required|alpha',
            'telefonoUsu' => 'required|digits:8',
            'emailUsu' => 'required|unique:Persona|email',
            'direccionUsu' => 'required',
            'username' => 'required|unique:Usuario|alpha_dash',
            'rut' => 'required|unique:Usuario|cl_rut',
            'pass' => 'required|same:confirmpassword',
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
            'pass.same' => 'La contraseña no coincide',
        ]);
        Persona::create([
            'rut' => Rut::parse($data['rut'])->normalize(),
            'nombreUsu' => $data['nombreUsu'],
            'apellidoUsu' => $data['apellidoUsu'],
            'telefonoUsu' => $data['telefonoUsu'],
            'emailUsu' => $data['emailUsu'],
            'direccionUsu' => $data['direccionUsu']
        ]);
        Usuario::create([
            'rut' => Rut::parse($data['rut'])->normalize(),
            'username' => $data['username'],
            'pass' => sha1($data['pass'])
        ]);
        return redirect('/login')->with('mensaje', 'Bienvenido a Envialo!');
    }
    public function edit()
    {
        return view('usuarios.edit', compact('usuario'));
    }
    public function update()
    {
        $usuario = Usuario::find(session('rutUsuario'));
        $data = request()->validate([
            'old_pass' => 'required',
            'pass' => 'required|same:pass2',
            'pass2' => 'required',
        ], [
            'old_pass.required' => 'Ingrese su contraseña actual',
            'pass.required' => 'Ingrese una contraseña',
            'pass.same' => 'La contraseña no coincide',
            'pass2.required' => 'Ingrese de nuevo su contraseña'
        ]);
        if (sha1($data['old_pass']) == $usuario->pass) {
            $data['pass'] = sha1($data['pass']);
            $usuario->update($data);
            return redirect('change/password')->with('mensaje', 'Contraseña actualizada');
        } else {
            return redirect('change/password')->with('error', 'Contraseña actual incorrecta');
        }

    }
    public function auth()
    {
        $data = request()->validate([
            'rut' => 'required|cl_rut',
            'pass' => 'required',
        ], [
            'rut.required' => 'Ingrese un rut',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'pass.required' => 'Ingrese una contraseña',
        ]);
        $rut_aux = Rut::parse($data['rut'])->normalize();
        $pass_aux = sha1($data['pass']);
        $encontrado = Usuario::where("rut", "=", "$rut_aux")->where("pass", "=", "$pass_aux")->first();
        // Verifico si la consulta obtuvo el registro
        if (count($encontrado) != 0) {
                /* ahora necesito saber  si el usuario logueado es un trabajador o no, para ello consulto en la
                tabla de empleados si el rut que se ingreso tiene algun registro asociado, en caso de que si,
                asigno más datos a la variable de sesion -- ADEMAS REVISAR SI EL TRABAJADOR NO ESTA SUSPENDIDO */
            $empleado = Empleado::where("rut", "=", "$rut_aux")->where("isActive", "=", "1")->first();
            if (count($empleado) != 0) {

                session()->put('idTipusu', $empleado->idTipusu);
                session()->put('nombreComuna', $empleado->sucursal->comuna->nombreComuna);
                session()->put('idComuna', $empleado->idComuna);
                session()->put('idSuc', $empleado->idSuc);
            }
            //si no es un trabajador simplemente agrego el nombre de usuario a la sesion
            session()->put('rutUsuario', $encontrado->rut);
            session()->put('username', $encontrado->username);
            return redirect('/')->with('mensaje', 'Bienvenido ' . $encontrado->username);
        } else {
            return redirect()->back()->with('error', 'El rut o la contraseña es incorrecta');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/')->with('mensaje', 'Sesion cerrada con exito');
    }
    public function encomiendas()
    {
        $detalles = Detalle::where("isAnulado", "!=", "1")->where("rut", "=", session('rutUsuario'))->get();
        return view('usuarios.history', compact('detalles', 'encomiendas'));

    }
    public function calcularCosto()
    {
        $data = request()->validate([
            'alto' => 'required|min:0|numeric',
            'largo' => 'required|min:0|numeric',
            'ancho' => 'required|min:0|numeric',
            'peso' => 'required|min:0|numeric'
        ], [
            '*.required' => 'El campo es obligatorio',
            '*.min' => 'Inserte solo numeros positivos',
            '*.numeric' => 'Solo los números por favor',
        ]);
        $alto = $data['alto'];
        $largo = $data['largo'];
        $ancho = $data['ancho'];
        $peso = $data['peso'];
        $preciofinal = 0;
        $precioBase = 3500;
        $volumen = $alto * $largo * $ancho;
        $pesoVolumetrico = $volumen / 5000;
        if ($peso > $pesoVolumetrico) {
            $difPeso = ($peso - $pesoVolumetrico) / 2;
            $preciofinal = $difPeso * $volumen + $precioBase;
            $preciofinal = round(($preciofinal / 10)) * 10;
        } else {
            $preciofinal = ($volumen * 0.3) + $precioBase;
            $preciofinal = round(($preciofinal / 10)) * 10;
        }
        return redirect('simularenvio')->with('costo', $preciofinal);
    }
    public function buscar($rut)
    {
        try {
            $rut = Rut::parse($rut)->normalize();
            $usuario = Usuario::find($rut);
            if (count($usuario) != 0) {
                echo json_encode($usuario);
            }
        } catch(Exception $e) {
            return redirect('/recepcionista/create2')->with('mensaje', 'No hay registros asociados a ese rut');
        }
    }


}
