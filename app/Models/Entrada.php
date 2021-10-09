<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Entrada extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'fecha',
        'proveedor_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='entradas';

    function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
