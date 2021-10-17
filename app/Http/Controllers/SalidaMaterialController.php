<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\SalidaMaterial;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaMaterialController extends Controller
{
    public function index(){

        $salidaMateriales = SalidaMaterial::paginate(5);
        return view('salidaMateriales.index', compact('salidaMateriales'));

    }

    public function create(){

        $salidas = Salida::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('salidaMateriales.create',compact('salidas', 'materiales'));

    }

    public function store(Request $request){

        $request->validate([
            'estado' => 'required',
            'cantidad' => 'required|numeric',
            'salida_id' => 'required',
            'material_id' => 'required',



        ]);

        SalidaMaterial::create($request->all());

         return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(SalidaMaterial $salidamaterial){
        //$usuario = User::findOrFail($id);
        return view('salidaMateriales.show', compact('salidaMaterial'));

    }

    public function edit(SalidaMaterial $salidaMaterial){

        return view('salidaMateriales.edit', compact('salidaMaterial'));

    }

    public function update(Request $request, SalidaMaterial $salidaMaterial){

        $data = $request->only('material_id', 'salida_id');

        $salidaMaterial->update($data);
        return redirect()->route('salidaMateriales.index')->with('success', 'SALIDA MATERIAL actualizado correctamente');
    }

    public function destroy(SalidaMaterial $salidaMaterial){

        $salidaMaterial->delete();
        return back()->with('success', 'SALIDA MATERIAL eliminado correctamente');

    }
}
