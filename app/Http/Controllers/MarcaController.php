<?php

namespace App\Http\Controllers;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MarcaController extends Controller
{
    public function index(){

        $marcas = Marca::paginate(15);
        return view('marcas.index', compact('marcas'));

    }

    public function create(){

        return view('marcas.create');

    }
    public function store(MarcaRequest $request){

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:marcas',

        // ]);

        Marca::create($request->all());
        Alert::success('Marca creada correctamente');

         return redirect()->route('marcas.index');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Marca $marca){
        //$usuario = User::findOrFail($id);
        return view('marcas.show', compact('marca'));

    }

    public function edit(Marca $marca){

        return view('marcas.edit', compact('marca'));

    }

    public function update(Request $request, Marca $marca){

        // $marca=Marca::findOrFail($marca);
        $data = $request->only('nombre');

        $marca->update($data);
        Alert::success('Marca actualizada Correctamente');
        return redirect()->route('marcas.index');
    }

    public function destroy(Marca $marca){

        $marca->delete();
        return back()->with('success', 'Marca eliminado correctamente');

    }
}
