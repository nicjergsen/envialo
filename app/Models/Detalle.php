<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 10:03:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Detalle
 *
 * @property string $rut
 * @property int $idEncomienda
 * @property string $destinatario
 * @property string $origen
 * @property string $destino
 * @property bool $isPagado
 * @property bool $isAnulado
 *
 * @property \App\Models\Persona $persona
 * @property \App\Models\Encomienda $encomienda
 *
 * @package App\Models
 */
class Detalle extends Eloquent
{
	protected $table = 'detalle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idEncomienda' => 'int',
		'isPagado' => 'bool',
		'isAnulado' => 'bool'
	];

	protected $fillable = [
        'rut',
        'idEncomienda',
		'destinatario',
		'origen',
		'destino',
		'isPagado',
		'isAnulado'
	];

	public function persona()
	{
		return $this->belongsTo(\App\Models\Persona::class, 'rut');
	}

	public function encomienda()
	{
		return $this->belongsTo(\App\Models\Encomienda::class, 'idEncomienda');
    }
    public function scopeBuscarporrut($query, $valor){
        if ($valor != null)
            $query->where("rut", 'like', "%$valor%");
        return $query;
    }
    public function scopeBuscarpordestinatario($query, $valor){
        if ($valor != null)
            $query->where("destinatario", 'like', "%$valor%");
        return $query;
    }
}
