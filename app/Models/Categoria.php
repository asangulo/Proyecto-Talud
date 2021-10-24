<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Categoria extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='categorias';

    function obra(){
        return $this->hasMany(Obra::class);
    }

    public static function obtenerDato($id){
        $dato=Categoria::select('nombre')
        ->where('id','=',$id )
        ->first();
        return $dato->nombre;
    }
}
