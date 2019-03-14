<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 20 Nov 2018 07:00:24 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ubicacionbodega
 * 
 * @property int $idEncomienda
 * @property int $id
 * 
 * @property \App\Models\Encomienda $encomienda
 * @property \App\Models\Sectorbodega $sectorbodega
 *
 * @package App\Models
 */
class Ubicacionbodega extends Eloquent
{
	protected $table = 'ubicacionbodega';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idEncomienda' => 'int',
		'id' => 'int'
	];

	protected $fillable = [
		'idEncomienda',
		'id'
	];

	public function encomienda()
	{
		return $this->belongsTo(\App\Models\Encomienda::class, 'idEncomienda');
	}

	public function sectorbodega()
	{
		return $this->belongsTo(\App\Models\Sectorbodega::class, 'id');
	}
}
