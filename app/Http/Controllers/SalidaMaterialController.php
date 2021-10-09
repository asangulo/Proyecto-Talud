<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\SalidaMaterial;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaMaterialController extends Controller
{
    public function index(){

        $SalidaMateriales = SalidaMaterial::paginate(5);
        return view('SalidaMateriales.index', compact('SalidaMateriales'));

    }

    public function create($id = null){
        $salida = new SalidaMaterial();

        // $tipoMaterial = TipoMaterial::orderBy('nombre')->get();
        $salida = Salida::orderBy('nombre')->get();
        $materiales = Material::orderBy('nombre')->get();


        if ($id != null) {
            $material = SalidaMaterial::findOrFail($id);
         }

        return view('materiales.create',['salida' => $salida, 'materiales' => $materiales]);

    }
    public function store(Request $request){

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:materiales',
        //     'peso' => 'required',
        //     'tamaño' => 'required',
        //     'cantidad' => 'required|numeric',
        //     'tipo_id' => 'required',
        //     'marca_id' => 'required',
        //     'proveedor_id' => 'required',
        //     'estado' => 'required',


        // ]);

        SalidaMaterial::create($request->all());


         return redirect()->route('salidaMateriales.index')->with('success', 'Marca creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(SalidaMaterial $material){
        //$usuario = User::findOrFail($id);
        return view('salidaMateriales.show', compact('salidaMaterial'));

    }

    public function edit(SalidaMaterial $marca){

        return view('salidaMateriales.edit', compact('salidaMaterial'));

    }

    public function update(Request $request, SalidaMaterial $salidaMaterial){

        $salidaMaterial=SalidaMaterial::findOrFail($salidaMaterial);

        $salidaMaterial->update();
        return redirect()->route('salidaMateriales.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(SalidaMaterial $salidaMaterial){

        $salidaMaterial->delete();
        return back()->with('success', 'marca eliminado correctamente');

    }
}
