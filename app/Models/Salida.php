<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

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
}
