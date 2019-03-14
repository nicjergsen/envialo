<?php

namespace App\Http\Controllers;

use App\Models\Tipoenvio;
use App\Models\Categorium;
use App\Models\Encomienda;
use App\Models\Persona;
use App\Models\Sucursal;
use App\Models\Detalle;
use App\Models\Seguimiento;
use App\Models\Comuna;
use PDF;
use Rut;

use Illuminate\Http\Request;

class recepcionistaController extends Controller
{
    public function create()
    {
        $tiposenvio = Tipoenvio::all();
        $categorias = Categorium::all();
        return view('recepcionista.create', compact('tiposenvio', 'categorias'));
    }
    public function store()
    {
        $data = request()->validate([
            'alto' => 'required|min:0|numeric',
            'largo' => 'required|min:0|numeric',
            'ancho' => 'required|min:0|numeric',
            'peso' => 'required|min:0|numeric',
            'valorDeclarado' => 'required|min:0|integer',
            'descripcion' => 'required|string',
            'idTipoe' => 'required',
            'idCat' => 'required',

        ], [
            'alto.required' => 'El campo Alto es obligatorio',
            'largo.required' => 'El campo largo es obligatorio',
            'ancho.required' => 'El campo ancho es obligatorio',
            'peso.required' => 'El campo peso es obligatorio',
            '*.min' => 'Inserte solo numeros positivos',
            '*.numeric' => 'Solo los números por favor',
            'valorDeclarado.required' => 'El campo valorDeclarado es obligatorio',
            'valorDeclarado.integer' => 'El valor declarado no debe contener decimales',
            'descripcion.required' => 'La descripcion es obligatoria',
            'descripcion.string' => 'Debe haber texto en la descripcion',
            'idTipoe' => 'El tipo de envio es obligatorio',
            'idCat' => 'La categoria del envio es obligatoria',


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
        Encomienda::create([
            'peso' => $peso,
            'alto' => $alto,
            'ancho' => $ancho,
            'largo' => $largo,
            'valorDeclarado' => $data['valorDeclarado'],
            'costoEnvio' => $preciofinal,
            'descripcion' => $data['descripcion'],
            'idTipoe' => $data['idTipoe'],
            'idCat' => $data['idCat'],
            'isEntregada' => '0'
        ]);
        $encomienda = Encomienda::where("descripcion", "=", $data['descripcion'])
            ->where("peso", "=", $peso)
            ->where("alto", "=", $alto)
            ->where("ancho", "=", $ancho)
            ->where("largo", "=", $largo)
            ->where("costoEnvio", "=", $preciofinal)
            ->where("valorDeclarado", "=", $data['valorDeclarado'])
            ->where("idTipoe", "=", $data['idTipoe'])
            ->where("idCat", "=", $data['idCat'])
            ->first();
        session()->put('idEncomienda', $encomienda->idEncomienda);

        return redirect('/recepcionista/create2');
    }
    public function create2()
    {
        return view('recepcionista.create2');
    }
    public function create4()
    {
        return view('recepcionista.create4');
    }
    public function store2()
    {
        $data = request()->validate([
            'rut' => "required|cl_rut",
            'nombreUsu' => 'required|alpha',
            'apellidoUsu' => 'required|alpha',
            'telefonoUsu' => 'required|digits:8|integer|min:0',
            'emailUsu' => 'required|email',
            'direccionUsu' => 'sometimes|string',
        ], [
            'rut.required' => 'El campo rut es obligatorio',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'nombreUsu.required' => 'El campo nombre es obligatorio',
            'nombreUsu.alpha' => 'Por favor ingrese un nombre válido',
            'apellidoUsu.required' => 'El campo apellido es obligatorio',
            'apellidoUsu.alpha' => 'Por favor ingrese un apellido válido',
            'telefonoUsu.required' => 'El telefono es obligatorio',
            'telefonoUsu.digits' => 'Ingrese un numero de telefono válido',
            'emailUsu.required' => 'El email es obligatorio',
            'emailUsu.unique' => 'El email ingresado ya existe',
            'emailUsu.email' => 'Ingrese un correo válido',
            'direccionUsu.string' => 'El campo direccion debe contener texto',
        ]);
        $remitente = Persona::find(Rut::parse($data['rut'])->normalize());
        if (count($remitente) == 0) {
            Persona::create([
                'rut' => Rut::parse($data['rut'])->normalize(),
                'nombreUsu' => $data['nombreUsu'],
                'apellidoUsu' => $data['apellidoUsu'],
                'telefonoUsu' => $data['telefonoUsu'],
                'emailUsu' => $data['emailUsu'],
                'direccionUsu' => $data['direccionUsu']
            ]);
            session()->put('rutRemitente', Rut::parse($data['rut'])->normalize());
        } else {
            session()->put('rutRemitente', $remitente->rut);
        }
        return redirect('/recepcionista/create4');
    }
    public function store4()
    {
        $data = request()->validate([
            'rut' => "required|cl_rut",
            'nombreUsu' => 'required|alpha',
            'apellidoUsu' => 'required|alpha',
            'telefonoUsu' => 'required|digits:8|integer|min:0',
            'emailUsu' => 'required|email',
            'direccionUsu' => 'sometimes|string',
        ], [
            'rut.required' => 'El campo rut es obligatorio',
            'rut.cl_rut' => 'Ingrese un rut válido',
            'nombreUsu.required' => 'El campo nombre es obligatorio',
            'nombreUsu.alpha' => 'Por favor ingrese un nombre válido',
            'apellidoUsu.required' => 'El campo apellido es obligatorio',
            'apellidoUsu.alpha' => 'Por favor ingrese un apellido válido',
            'telefonoUsu.required' => 'El telefono es obligatorio',
            'telefonoUsu.digits' => 'Ingrese un numero de telefono válido',
            'telefonoUsu.integer' => 'Los decimales no existen en los numeros telefonicos',
            'telefonoUsu.min' => 'Los numeros telefonicos no son negativos',
            'emailUsu.required' => 'El email es obligatorio',
            'emailUsu.unique' => 'El email ingresado ya existe',
            'emailUsu.email' => 'Ingrese un correo válido',
            'direccionUsu.string' => 'El campo direccion debe contener texto',
        ]);
        $destinatario = Persona::find(Rut::parse($data['rut'])->normalize());
        if (count($destinatario) == 0) {
            Persona::create([
                'rut' => Rut::parse($data['rut'])->normalize(),
                'nombreUsu' => $data['nombreUsu'],
                'apellidoUsu' => $data['apellidoUsu'],
                'telefonoUsu' => $data['telefonoUsu'],
                'emailUsu' => $data['emailUsu'],
                'direccionUsu' => $data['direccionUsu']
            ]);
            session()->put('rutDestinatario', Rut::parse($data['rut'])->normalize());
        } else {
            session()->put('rutDestinatario', $destinatario->rut);
        }
        return redirect('/recepcionista/create3');
    }
    public function create3()
    {
        $sucursales = Sucursal::where("idSuc", "!=", session('idSuc'))
            ->where("isActive", "=", "1")
            ->get();
        return view('recepcionista.create3', compact('sucursales'));
    }
    public function store3()
    {
        $data = request()->all();
        $encomienda = Encomienda::find($data['idEncomienda']);
        $isPagada = 0;
        if ($encomienda->idTipoe == 1) {
            $isPagada = 0;
        } else {
            $isPagada = 1;
        }
        Detalle::create([
            'rut' => $data['rut'],
            'idEncomienda' => $data['idEncomienda'],
            'destinatario' => $data['destinatario'],
            'origen' => $data['origen'],
            'destino' => $data['destino'],
            'isPagado' => $isPagada
        ]);
        $comuna = Comuna::where("nombreComuna", "=", $data['origen'])->first();
        Seguimiento::create([
            'trackingSeg' => uniqid(),
            'idEncomienda' => $data['idEncomienda'],
            'idComuna' => $comuna->idComuna,
            'fechaHora' => date("Y-m-d H:i:s")
        ]);


        return redirect()->action('recepcionistaController@pdf');
    }

    public function pdf()
    {
        $remitente = Persona::findOrFail(session('rutRemitente'));
        $destinatario = Persona::find(session('rutDestinatario'));
        $encomienda = Encomienda::find(session('idEncomienda'));
        $seguimiento = Seguimiento::where("idEncomienda", "=", session('idEncomienda'))->first();
        $detalle = Detalle::where("rut", "=", session('rutRemitente'))->where("idEncomienda", "=", session('idEncomienda'))->where("destinatario", "=", session('rutDestinatario'))->get();
        return view('pdf', compact('remitente', 'destinatario', 'encomienda', 'seguimiento', 'detalle'));

    }

    public function search()
    {
        return view('/recepcionista/search');
    }

    public function edit()
    {
        $data = request()->all();
        $detalle = Detalle::where("idEncomienda", "=", $data['idEncomienda'])->where("isAnulado", "=", "0")->first();
        $seguimiento = Seguimiento::where("idEncomienda", "=", $data['idEncomienda'])->where("isAnulado", "=", "0")->first();
        if ((count($detalle) == 0) || (count($seguimiento) == 0)) {
            return redirect('recepcionista/search')->with('error', 'La encomienda ingresada no existe o ya fue anulada');
        }
        else{
        return view('recepcionista.edit', compact('detalle'));
        }
    }
    public function anular()
    {
        $data = request()->all();

        $detalle = Detalle::where("idEncomienda", "=", $data['idEncomienda'])->where("isAnulado", "=", "0")->first();
        $seguimiento = Seguimiento::where("idEncomienda", "=", $data['idEncomienda'])->where("isAnulado", "=", "0")->first();
        if ((count($detalle) == 0) || (count($seguimiento) == 0)) {
            session()->flash('error', 'Encomienda ya anulada');
            return view('recepcionista.search');
        } else {
            Detalle::where("idEncomienda", "=", $data['idEncomienda'])->update(['isAnulado' => 1]);
            Seguimiento::where("idEncomienda", "=", $data['idEncomienda'])->update(['isAnulado' => 1]);
            session()->flash('mensaje', 'Encomienda anulada');
            return view('recepcionista.search');
        }
    }
}
