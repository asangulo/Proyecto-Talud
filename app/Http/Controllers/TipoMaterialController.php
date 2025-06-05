<?php

namespace App\Http\Controllers;


use App\Http\Requests\TipoMaterialRequest;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TipoMaterialController extends Controller
{
    public function index(){

        $tipoMateriales = TipoMaterial::paginate(15);
        return view('tipoMateriales.index', compact('tipoMateriales'));

    }

    public function create(){

        return view('tipoMateriales.create');

    }
    public function store(TipoMaterialRequest $request){

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:tipo_materiales',
        // ]);

        TipoMaterial::create($request->all());

        Alert::success('Tipo Material creado correctamente');


         return redirect()->route('tipoMateriales.index');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(TipoMaterial $tipoMaterial){
        //$usuario = User::findOrFail($id);
        return view('tipoMateriales.show', compact('tipoMaterial'));

    }

    public function edit(TipoMaterial $tipoMaterial){

        return view('tipoMateriales.edit', compact('tipoMaterial'));

    }

    public function update(Request $request, $id){


        $tipoMaterial=TipoMaterial::find($id);
        $tipoMaterial->nombre = $request->input('nombre');


        $tipoMaterial->save();
        Alert::success('Tipo Material actualizado');

        return redirect()->route('tipoMateriales.index');
    }

    public function destroy(TipoMaterial $tipoMaterial){

        $tipoMaterial->delete();
        return back()->with('success', 'Tipo Material eliminado correctamente');

    }
}
