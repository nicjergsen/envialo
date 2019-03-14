<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomienda;
use App\Models\Ubicacionbodega;
use App\Models\Sectorbodega;
use App\Models\Sucursal;
use App\Models\Seguimiento;
use App\Models\Fasesseguimiento;
use App\Models\Detalle;
use App\Models\Persona;
use Rut;

class bodegueroController extends Controller
{
    public function search()
    {
        return view('bodega/search');
    }
    public function search2()
    {
        return view('bodega/search2');
    }
    public function search3()
    {
        return view('bodega/search3');
    }
    public function search4()
    {
        return view('bodega/search4');
    }
    public function buscar()
    {
        $data = request()->all();
        $encomienda = Encomienda::where("idEncomienda", "=", $data['idEncomienda'])->where("isEntregada", "=", "0")->first();
        if (count($encomienda) == 0)
            return redirect('bodega/search4')->with('error', 'Encomienda ingresada no existe o ya fue entregada');
        $ubicacion = Ubicacionbodega::where("idEncomienda", "=", $data['idEncomienda'])->first();
        if (count($ubicacion) != 0)
            return redirect('bodega/search4')->with('mensaje', 'La encomienda se encuentra en la Sucursal' . $ubicacion->sectorbodega->sucursal->nombreSuc . ' en ' . $ubicacion->sectorbodega->nombreSec);
        else
            return redirect('bodega/search4')->with('error', 'La encomienda ingresada no tiene una ubicacion asignada');
    }

    public function create()
    {
        $data = request()->all();
        $encomienda = Encomienda::where("idEncomienda", "=", $data['idEncomienda'])->where("isEntregada", "=", "0")->first();
        if (count($encomienda) == 0)
            return redirect('bodega/search')->with('error', 'Encomienda no encontrada');
        $sectores = Sectorbodega::where("idSuc", "=", session('idSuc'))->get();
        $sucursal = Sucursal::where("idSuc", "=", session('idSuc'))->first();
        return view('bodega.create', compact('sectores', 'encomienda', 'sucursal'));
    }
    public function nuevoestado()
    {
        $data = request()->all();
        $encomienda = Encomienda::where("idEncomienda", "=", $data['idEncomienda'])->where("isEntregada", "=", "0")->first();
        if (count($encomienda) == 0)
            return redirect('bodega/search2')->with('mensaje', 'Encomienda no encontrada');
        $seguimiento = Seguimiento::where("idEncomienda", "=", $data['idEncomienda'])->orderBy('fechaHora', 'desc')->firstOrFail();
        $fases = Fasesseguimiento::where("idFaseg", ">", $seguimiento->idFaseg)->where("idFaseg", "!=", 4)->get();
        if (count($fases) == 0) {
            session()->flash('error', 'La encomienda ya se encuentra en su destino');
            return view('bodega/search2');
        }
        return view('bodega.tracking', compact('encomienda', 'seguimiento', 'fases'));
    }
    public function store()
    {
        $data = request()->all();
        Ubicacionbodega::create([
            'idEncomienda' => $data['idEncomienda'],
            'id' => $data['id']
        ]);

        return view('bodega/search');
    }
    public function guardarestado()
    {
        $data = request()->all();
        Seguimiento::create([
            'trackingSeg' => $data['trackingSeg'],
            'idEncomienda' => $data['idEncomienda'],
            'idFaseg' => $data['idFaseg'],
            'fechaHora' => date("Y-m-d H:i:s")
        ]);
        session()->flash('mensaje', 'Estado actualizado');
        return view('bodega/search2');
    }
    public function eliminarDeBodega()
    {
        $data = request()->all();
        $encomienda = Encomienda::where("idEncomienda", "=", $data['idEncomienda'])->where("isEntregada", "=", 0)->first();
        $seguimiento = Seguimiento::where("idEncomienda", "=", $data['idEncomienda'])->where("isAnulado", "=", 0)->first();
        if ((count($encomienda) == 0) || (count($seguimiento) == 0))
            return redirect('bodega/search3')->with('error', 'La encomienda ingresada ya fue entregada o no existe');
        if ($encomienda->isEntregada == 0) {
            $encomienda->isEntregada = 1;
            $encomienda->update();
            Seguimiento::create([
                'trackingSeg' => $seguimiento->trackingSeg,
                'idEncomienda' => $data['idEncomienda'],
                'idFaseg' => 4,
                'fechaHora' => date("Y-m-d H:i:s")
            ]);

        }
        return redirect('bodega/search3')->with('mensaje', 'Encomienda entregada');
    }
    public function busquedaAvanzada(Request $request)
    {
        $valor = $request->get('valor');
        $campo = $request->get('campo');
        if($campo == "trackingSeg"){
            $seguimiento = Seguimiento::buscarportracking($valor)->where("isAnulado","=", "0")->get();
            return view('bodega/busqueda', compact('seguimiento'));
        }
        else if($campo == "rut"){
            $detalle = Detalle::buscarporrut($valor)->get();
            return view('bodega/busqueda', compact('detalle'));
        }
        else if($campo == "destinatario"){
            $destinatario = Detalle::buscarpordestinatario($valor)->get();
            return view('bodega/busqueda', compact('destinatario'));
        }
        return view('bodega/busqueda');
    }
}

