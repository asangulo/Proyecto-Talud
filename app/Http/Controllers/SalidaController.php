<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index(){

        $salidas = Salida::paginate(5);
        return view('salidas.index', compact('salidas'));

    }

    public function create(){

        return view('salidas.create');

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20',

        ]);

        Salida::create($request->all());


         return redirect()->route('salidas.index')->with('success', 'salida creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Salida $salida){
        //$usuario = User::findOrFail($id);
        return view('salidas.show', compact('salida'));

    }

    public function edit(Salida $salida){

        return view('salidas.edit', compact('salida'));

    }

    public function update(Request $request, Salida $salida){

        $salida=Salida::findOrFail($salida);

        $salida->update();
        return redirect()->route('salidas.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Salida $salida){

        $salida->delete();
        return back()->with('success', 'salida eliminado correctamente');

    }
}
