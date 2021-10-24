<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Salida extends Model
{

    use HasApiTokens, HasFactory;
    protected $fillable = [
        'fecha',
        'obra_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='salidas';

    function obras(){
        return $this->belongsTo(Obra::class);
    }

    function salidaMaterial(){
        return $this->hasMany(SalidaMaterial::class);
    }

    public static function obtenerDatosTrimestre(){
        $datos = DB::table('salida_materiales')
        ->select('')
        ->get();
        return $datos;
    }
}
