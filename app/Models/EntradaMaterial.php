<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class EntradaMaterial extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'material_id',
        'entrada_id',
        'cantidad',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='entrada_materiales';

    function material(){
        return $this->belongsTo(Material::class);
    }
}
