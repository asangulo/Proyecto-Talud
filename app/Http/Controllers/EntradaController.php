<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index(){

        $proveedores = Proveedor::orderBy('nombre')->get();

        $entradas = Entrada::paginate(5);
        return view('entradas.index', compact('entradas', 'proveedores'));

    }

    public function create(){

        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('entradas.create',compact('proveedores'));

    }
    public function store(Request $request){
          $request->validate([
            'fecha' => 'required|date',
            'proveedor_id' => 'required',


         ]);


        Entrada::create($request->all());


         return redirect()->route('entradas.index')->with('success', 'entrada creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function edit(Entrada $entrada){

        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('entradas.edit', compact('entrada', 'proveedores'));




    }

    public function show(){


    }

    public function update(Request $request, Entrada $entrada){

        $data = $request->only('fecha', 'proveedor_id');


        $entrada->update($data);
        return redirect()->route('entradas.index')->with('success', 'Entrada actualizado correctamente');
    }

    public function destroy(Entrada $entrada){

        $entrada->delete();
        return back()->with('success', 'entrada eliminado correctamente');

    }
}
