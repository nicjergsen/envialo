<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Nov 2018 07:44:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comuna
 * 
 * @property int $idComuna
 * @property string $nombreComuna
 * 
 * @property \Illuminate\Database\Eloquent\Collection $seguimientos
 * @property \Illuminate\Database\Eloquent\Collection $sucursals
 *
 * @package App\Models
 */
class Comuna extends Eloquent
{
	protected $table = 'comuna';
	protected $primaryKey = 'idComuna';
	public $timestamps = false;

	protected $fillable = [
		'nombreComuna'
	];

	public function seguimientos()
	{
		return $this->hasMany(\App\Models\Seguimiento::class, 'idComuna');
	}

	public function sucursals()
	{
		return $this->hasMany(\App\Models\Sucursal::class, 'idComuna');
	}
}
