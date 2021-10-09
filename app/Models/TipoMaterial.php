<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class TipoMaterial extends Model
{
    use HasApiTokens, HasFactory;
    protected $table='tipo_materiales';

    protected $fillable = [
        'nombre',

    ];
    protected $hidden = [

        'remember_token',
    ];

    function material(){
        return $this->hasMany(Material::class);
    }
}
