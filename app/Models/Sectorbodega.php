<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 08:00:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sectorbodega
 * 
 * @property int $id
 * @property int $idSuc
 * @property string $nombreSec
 * 
 * @property \App\Models\Sucursal $sucursal
 * @property \App\Models\Ubicacionbodega $ubicacionbodega
 *
 * @package App\Models
 */
class Sectorbodega extends Eloquent
{
	protected $table = 'sectorbodega';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'idSuc' => 'int'
	];

	protected $fillable = [
		'idSuc',
		'nombreSec'
	];

	public function sucursal()
	{
		return $this->belongsTo(\App\Models\Sucursal::class, 'idSuc');
	}

	public function ubicacionbodega()
	{
		return $this->hasOne(\App\Models\Ubicacionbodega::class, 'id');
	}
}
