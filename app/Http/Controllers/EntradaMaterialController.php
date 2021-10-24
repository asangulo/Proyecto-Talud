<?php

namespace App\Http\Controllers;

use App\Models\EntradaMaterial;
use App\Models\Entrada;
use App\Models\Material;
use Illuminate\Http\Request;

class EntradaMaterialController extends Controller
{
    public function index(){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        $entradaMateriales = EntradaMaterial::paginate(5);
        return view('entradaMateriales.index', compact('entradaMateriales', 'entradas', 'materiales'));

    }

    public function create(){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('entradaMateriales.create',compact('entradas', 'materiales'));

    }

    public function store(Request $request){

        $request->validate([
            'estado' => 'required',
            'cantidad' => 'required|numeric',
            'material_id' => 'required',
            'entrada_id' => 'required',
        ]);

        EntradaMaterial::create($request->all());

         return redirect()->route('entradaMateriales.index')->with('success', 'entrada materiales creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function edit(EntradaMaterial $entradaMaterial){

        $entradas = Entrada::orderBy('fecha')->get();
        $materiales = Material::orderBy('nombre')->get();

        return view('entradaMateriales.edit', compact('entradaMaterial','entradas', 'materiales'));

    }

    public function show(EntradaMaterial $entradaMaterial){
        //$usuario = User::findOrFail($id);
        return view('entradaMateriales.show', compact('entradaMaterial'));

    }


    public function update(Request $request, EntradaMaterial $entradaMaterial){

        $data = $request->only('material_id', 'entrada_id', 'cantidad', 'estado');

        $entradaMaterial->update($data);
        return redirect()->route('entradaMateriales.index')->with('success', 'Entrada Material actualizado correctamente');
    }

    public function destroy(EntradaMaterial $entradaMaterial){

        $entradaMaterial->delete();
        return back()->with('success', 'Entrada Material eliminado correctamente');

    }
}
