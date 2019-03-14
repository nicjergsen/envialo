<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 07:17:54 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sucursal
 *
 * @property int $idSuc
 * @property int $idComuna
 * @property string $nombreSuc
 * @property string $direccionSuc
 * @property string $aperturaSuc
 * @property string $cierreSuc
 * @property int $telefonoSuc
 * @property string $emailContactoSuc
 * @property string $googleMapsSuc
 * @property bool $isActive
 *
 * @property \App\Models\Comuna $comuna
 * @property \Illuminate\Database\Eloquent\Collection $empleados
 * @property \Illuminate\Database\Eloquent\Collection $sectorbodegas
 *
 * @package App\Models
 */
class Sucursal extends Eloquent
{
	protected $table = 'sucursal';
	protected $primaryKey = 'idSuc';
	public $timestamps = false;

	protected $casts = [
		'idComuna' => 'int',
		'telefonoSuc' => 'int',
		'isActive' => 'bool'
	];

	protected $fillable = [
		'idComuna',
		'nombreSuc',
		'direccionSuc',
		'aperturaSuc',
		'cierreSuc',
		'telefonoSuc',
		'emailContactoSuc',
		'googleMapsSuc',
		'isActive'
	];

	public function comuna()
	{
		return $this->belongsTo(\App\Models\Comuna::class, 'idComuna');
	}

	public function empleados()
	{
		return $this->hasMany(\App\Models\Empleado::class, 'idSuc');
	}

	public function sectorbodegas()
	{
		return $this->hasMany(\App\Models\Sectorbodega::class, 'idSuc');
    }
    public function scopeBuscar($query, $campo, $valor)
    {
        if(($campo!=null)||($valor!=null))
            $query->where("$campo",'like',"%$valor%");
            return $query;
    }
}
