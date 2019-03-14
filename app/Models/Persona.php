<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 06:27:32 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Persona
 *
 * @property string $rut
 * @property string $nombreUsu
 * @property string $apellidoUsu
 * @property int $telefonoUsu
 * @property string $emailUsu
 * @property string $direccionUsu
 *
 * @property \Illuminate\Database\Eloquent\Collection $detalles
 * @property \App\Models\Usuario $usuario
 *
 * @package App\Models
 */
class Persona extends Eloquent
{
	protected $table = 'persona';
	protected $primaryKey = 'rut';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'telefonoUsu' => 'int'
	];

	protected $fillable = [
        'rut',
		'nombreUsu',
		'apellidoUsu',
		'telefonoUsu',
		'emailUsu',
		'direccionUsu'
	];

	public function detalles()
	{
		return $this->hasMany(\App\Models\Detalle::class, 'rut');
	}

	public function usuario()
	{
		return $this->hasOne(\App\Models\Usuario::class, 'rut');
	}
}
