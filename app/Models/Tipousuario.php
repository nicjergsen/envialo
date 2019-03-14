<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 07:44:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tipousuario
 * 
 * @property int $idTipusu
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property \Illuminate\Database\Eloquent\Collection $empleados
 *
 * @package App\Models
 */
class Tipousuario extends Eloquent
{
	protected $table = 'tipousuario';
	protected $primaryKey = 'idTipusu';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function empleados()
	{
		return $this->hasMany(\App\Models\Empleado::class, 'idTipusu');
	}
}
