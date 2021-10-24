<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class SalidaMaterial extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'estado',
        'cantidad',
        'salida_id',
        'material_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='salida_materiales';

    function material(){
        return $this->belongsTo(Material::class);
    }

    function salida(){
        return $this->belongsTo(salida::class);
    }

    public static function obtenerDatosTrimestre(){
        $primer_dia= DB::select('select sum(cantidad) as primer_dia  from salida_materiales where DAY(created_at) = DAY(now())-5  and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $segundo_dia= DB::select('select sum(cantidad) as segundo_dia  from salida_materiales where DAY(created_at) = DAY(now())-4 and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $tercer_dia= DB::select('select sum(cantidad) as tercer_dia  from salida_materiales where DAY(created_at) = DAY(now())-3 and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $cuarto_dia= DB::select('select sum(cantidad) as cuarto_dia  from salida_materiales where DAY(created_at) = DAY(now())-2 and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $quinto_dia= DB::select('select sum(cantidad) as quinto_dia  from salida_materiales where DAY(created_at) = DAY(now())-1 and MONTH(created_at) = MONTH(now()) and YEAR(created_at) = YEAR(now())');

        $datos=[$primer_dia,$segundo_dia,$tercer_dia,$cuarto_dia,$quinto_dia];
        return $datos;
    }
}
