<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Obra extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'nombre',
        'fechaInicio',
        'fechaEntrega',
        'estado',
        'cantidad',
        'descripcion',
        'cliente_id',
        'categoria_id',
        'usuario_id',


    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table = "obras";

    function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    function salida(){
        return $this->hasMany(Salida::class);
    }
}
