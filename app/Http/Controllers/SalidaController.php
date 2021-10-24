<?php

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index(){

        $obras = Obra::orderBy('nombre')->get();

        $salidas = Salida::paginate(5);
        return view('salidas.index', compact('salidas', 'obras'));

    }

    public function create(){

        $obras = Obra::orderBy('nombre')->get();
        return view('salidas.create', compact('obras'));

    }
    public function store(Request $request){

        $request->validate([
            'fecha' => 'required|date',
            'obra_id' => 'required',

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

        $obras = Obra::orderBy('nombre')->get();
        return view('salidas.edit', compact('salida', 'obras'));

    }

    public function update(Request $request, Salida $salida){

        $data = $request->only('fecha', 'obra_id');

        $salida->update($data);
        return redirect()->route('salidas.index')->with('success', 'Salida actualizada correctamente');
    }

    public function destroy(Salida $salida){

        $salida->delete();
        return back()->with('success', 'salida eliminado correctamente');

    }
}
