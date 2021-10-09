<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'clave',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='clientes';

    function obra(){
        return $this->hasMany(Obra::class);
    }
}
