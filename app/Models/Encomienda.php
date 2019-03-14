<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 06 Dec 2018 08:58:41 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Encomienda
 * 
 * @property int $idEncomienda
 * @property int $idTipoe
 * @property int $idCat
 * @property float $peso
 * @property float $alto
 * @property float $ancho
 * @property float $largo
 * @property int $valorDeclarado
 * @property int $costoEnvio
 * @property string $descripcion
 * @property bool $isEntregada
 * @property \Carbon\Carbon $createdAt
 * 
 * @property \App\Models\Tipoenvio $tipoenvio
 * @property \App\Models\Categorium $categorium
 * @property \Illuminate\Database\Eloquent\Collection $detalles
 * @property \Illuminate\Database\Eloquent\Collection $seguimientos
 * @property \Illuminate\Database\Eloquent\Collection $ubicacionbodegas
 *
 * @package App\Models
 */
class Encomienda extends Eloquent
{
	protected $table = 'encomienda';
	protected $primaryKey = 'idEncomienda';
	public $timestamps = false;

	protected $casts = [
		'idTipoe' => 'int',
		'idCat' => 'int',
		'peso' => 'float',
		'alto' => 'float',
		'ancho' => 'float',
		'largo' => 'float',
		'valorDeclarado' => 'int',
		'costoEnvio' => 'int',
		'isEntregada' => 'bool'
	];

	protected $dates = [
		'createdAt'
	];

	protected $fillable = [
		'idTipoe',
		'idCat',
		'peso',
		'alto',
		'ancho',
		'largo',
		'valorDeclarado',
		'costoEnvio',
		'descripcion',
		'isEntregada',
		'createdAt'
	];

	public function tipoenvio()
	{
		return $this->belongsTo(\App\Models\Tipoenvio::class, 'idTipoe');
	}

	public function categorium()
	{
		return $this->belongsTo(\App\Models\Categorium::class, 'idCat');
	}

	public function detalles()
	{
		return $this->hasMany(\App\Models\Detalle::class, 'idEncomienda');
	}

	public function seguimientos()
	{
		return $this->hasMany(\App\Models\Seguimiento::class, 'idEncomienda');
	}

	public function ubicacionbodegas()
	{
		return $this->hasMany(\App\Models\Ubicacionbodega::class, 'idEncomienda');
	}
}
