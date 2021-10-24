<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Proveedor extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'celular',
        'correo',
        'clave',
        'estado',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='proveedores';

    function entrada(){
        return $this->hasMany(Entrada::class);
    }

    function material(){
        return $this->hasMany(Material::class);
    }

    public static function obtenerProveedor($id){
        $dato=Proveedor::select('nombre')
        ->where('id','=',$id )
        ->first();
        return $dato->nombre;
    }
}
