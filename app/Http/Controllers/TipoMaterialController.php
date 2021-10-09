<?php

namespace App\Http\Controllers;

use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class TipoMaterialController extends Controller
{
    public function index(){

        $tipoMateriales = TipoMaterial::paginate(5);
        return view('tipoMateriales.index', compact('tipoMateriales'));

    }

    public function create(){

        return view('tipoMateriales.create');

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20',


        ]);

        TipoMaterial::create($request->all());


         return redirect()->route('tipoMateriales.index')->with('success', 'Marca creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(TipoMaterial $tipoMaterial){
        //$usuario = User::findOrFail($id);
        return view('tipoMateriales.show', compact('tipoMaterial'));

    }

    public function edit(TipoMaterial $tipoMaterial){

        return view('tipoMateriales.edit', compact('tipoMaterial'));

    }

    public function update(Request $request, TipoMaterial $tipoMaterial){

        $data = $request->only('nombre');

        $tipoMaterial->update($data);
        return redirect()->route('tipoMateriales.index')->with('success', 'Tipo Material actualizado correctamente');
    }

    public function destroy(TipoMaterial $tipoMaterial){

        $tipoMaterial->delete();
        return back()->with('success', 'marca eliminado correctamente');

    }
}
