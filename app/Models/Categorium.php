<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 07:44:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Categorium
 * 
 * @property int $idCat
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property \Illuminate\Database\Eloquent\Collection $encomiendas
 *
 * @package App\Models
 */
class Categorium extends Eloquent
{
	protected $primaryKey = 'idCat';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function encomiendas()
	{
		return $this->hasMany(\App\Models\Encomienda::class, 'idCat');
	}
}
