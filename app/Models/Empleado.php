<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 26 Nov 2018 06:28:27 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Empleado
 *
 * @property string $rut
 * @property int $idTipusu
 * @property int $idSuc
 * @property bool $isActive
 *
 * @property \App\Models\Usuario $usuario
 * @property \App\Models\Sucursal $sucursal
 * @property \App\Models\Tipousuario $tipousuario
 *
 * @package App\Models
 */
class Empleado extends Eloquent
{
    protected $table = 'empleado';
    protected $primaryKey = 'rut';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'idTipusu' => 'int',
        'idSuc' => 'int',
        'isActive' => 'bool'
    ];

    protected $fillable = [
        'rut',
        'idTipusu',
        'idSuc',
        'isActive'
    ];

    public function usuario()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'rut');
    }

    public function sucursal()
    {
        return $this->belongsTo(\App\Models\Sucursal::class, 'idSuc');
    }

    public function tipousuario()
    {
        return $this->belongsTo(\App\Models\Tipousuario::class, 'idTipusu');
    }
    public function scopeBuscar($query, $campo, $valor)
    {
        if (($campo != null) || ($valor != null))
            $query->where("$campo", 'like', "%$valor%");
        return $query;
    }
}
