<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 07:44:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Fasesseguimiento
 * 
 * @property int $idFaseg
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property \Illuminate\Database\Eloquent\Collection $seguimientos
 *
 * @package App\Models
 */
class Fasesseguimiento extends Eloquent
{
	protected $table = 'fasesseguimiento';
	protected $primaryKey = 'idFaseg';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function seguimientos()
	{
		return $this->hasMany(\App\Models\Seguimiento::class, 'idFaseg');
	}
}
