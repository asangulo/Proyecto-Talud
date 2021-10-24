<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\EntradaMaterial;
use App\Models\SalidaMaterial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $materiales = Material::paginate(5);
        $dias_entrada=EntradaMaterial::obtenerDatosTrimestre();
        $dias_salidas=SalidaMaterial::obtenerDatosTrimestre();
        return view('home',[
            'dias_entrada'=>$dias_entrada,
            'dias_salidas'=>$dias_salidas,
            'materiales'=>$materiales,

        ]);
    }
}
