<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 07:44:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tipoenvio
 * 
 * @property int $idTipoe
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property \Illuminate\Database\Eloquent\Collection $encomiendas
 *
 * @package App\Models
 */
class Tipoenvio extends Eloquent
{
	protected $table = 'tipoenvio';
	protected $primaryKey = 'idTipoe';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function encomiendas()
	{
		return $this->hasMany(\App\Models\Encomienda::class, 'idTipoe');
	}
}
