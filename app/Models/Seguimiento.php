<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 06 Dec 2018 08:18:40 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Seguimiento
 *
 * @property string $trackingSeg
 * @property int $idEncomienda
 * @property int $idFaseg
 * @property int $idComuna
 * @property string $fechaHora
 * @property int $ciudadActual
 * @property bool $isAnulado
 *
 * @property \App\Models\Comuna $comuna
 * @property \App\Models\Encomienda $encomienda
 * @property \App\Models\Fasesseguimiento $fasesseguimiento
 *
 * @package App\Models
 */
class Seguimiento extends Eloquent
{
    protected $table = 'seguimiento';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'idEncomienda' => 'int',
        'idFaseg' => 'int',
        'idComuna' => 'int',
        'ciudadActual' => 'int',
        'isAnulado' => 'bool'
    ];

    protected $fillable = [
        'trackingSeg',
        'idEncomienda',
        'idFaseg',
        'idComuna',
        'fechaHora',
        'ciudadActual',
        'isAnulado'
    ];

    public function comuna()
    {
        return $this->belongsTo(\App\Models\Comuna::class, 'idComuna');
    }

    public function encomienda()
    {
        return $this->belongsTo(\App\Models\Encomienda::class, 'idEncomienda');
    }

    public function fasesseguimiento()
    {
        return $this->belongsTo(\App\Models\Fasesseguimiento::class, 'idFaseg');
    }
    public function scopeBuscarportracking($query, $valor)
    {
        if ($valor != null)
            $query->where("trackingSeg", 'like', "%$valor%");
        return $query;
    }

}
