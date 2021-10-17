<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

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
}
