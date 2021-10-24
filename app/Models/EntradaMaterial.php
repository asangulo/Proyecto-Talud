<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
class EntradaMaterial extends Model
{

    use HasApiTokens, HasFactory;

    protected $fillable = [
        'material_id',
        'entrada_id',
        'cantidad',
        'estado',

    ];
    protected $hidden = [

        'remember_token',
    ];

    protected $table='entrada_materiales';

    function material(){
        return $this->belongsTo(Material::class);
    }
    public static function obtenerDatosTrimestre(){
        $primer_dia= DB::select('select sum(cantidad) as primer_dia  from entrada_materiales where DAY(created_at) = DAY(now())-5  and MONTH(created_at) =MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $segundo_dia= DB::select('select sum(cantidad) as segundo_dia  from entrada_materiales where DAY(created_at) = DAY(now())-4 and MONTH(created_at) =MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $tercer_dia= DB::select('select sum(cantidad) as tercer_dia  from entrada_materiales where DAY(created_at) = DAY(now())-3 and MONTH(created_at) =MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $cuarto_dia= DB::select('select sum(cantidad) as cuarto_dia  from entrada_materiales where DAY(created_at) = DAY(now())-2 and MONTH(created_at) =MONTH(now()) and YEAR(created_at) = YEAR(now())');
        $quinto_dia= DB::select('select sum(cantidad) as quinto_dia  from entrada_materiales where DAY(created_at) = DAY(now())-1 and MONTH(created_at) =MONTH(now()) and YEAR(created_at) = YEAR(now())');

        $datos=[$primer_dia,$segundo_dia,$tercer_dia,$cuarto_dia,$quinto_dia];
        return $datos;
    }
    public static function getData(){
        $data=DB::table('entrada_materiales')
        ->leftjoin('materiales','materiales.id','=','entrada_materiales.material_id')
        ->select('entrada_materiales.id','entrada_materiales.estado','entrada_materiales.cantidad',
        'entrada_materiales.estado','entrada_materiales.material_id',
        'entrada_materiales.entrada_id','materiales.nombre',
        'materiales.nombre','materiales.tamaño')
        ->get();
        return $data;
    }

    public static function getCant($rel_entrada){
        $data=DB::table('entrada_materiales')
        ->select('cantidad')
        ->where('id','=',$rel_entrada)
        ->first();
        return $data;
    }
    public static function cambiarCantidad($cantidad,$id){
        EntradaMaterial::where('id','=',$id)
        ->update(['cantidad'=>$cantidad]);
    }
}
