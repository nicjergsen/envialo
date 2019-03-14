<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 06:27:57 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Usuario
 *
 * @property string $rut
 * @property string $username
 * @property string $pass
 *
 * @property \App\Models\Persona $persona
 * @property \App\Models\Empleado $empleado
 *
 * @package App\Models
 */
class Usuario extends Eloquent
{
	protected $table = 'usuario';
	protected $primaryKey = 'rut';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
        'rut',
		'username',
		'pass'
	];

	public function persona()
	{
		return $this->belongsTo(\App\Models\Persona::class, 'rut');
	}

	public function empleado()
	{
		return $this->hasOne(\App\Models\Empleado::class, 'rut');
	}
}
