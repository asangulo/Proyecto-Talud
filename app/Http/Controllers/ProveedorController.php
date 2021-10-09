<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(){

        $proveedores = Proveedor::paginate(5);
        return view('proveedores.index', compact('proveedores'));

    }

    public function create(){

        return view('proveedores.create');

    }

    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:10',
            'celular' =>'required|numeric|unique:proveedores',
            'correo' => 'required|email|unique:proveedores',
            'estado' =>'required',

        ]);


        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', 'usuario creado correctamente');
        // return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Proveedor $proveedor){
        //$usuario = User::findOrFail($id);
        return view('proveedores.show', compact('proveedor'));

    }

    public function edit(Proveedor $proveedor){

        return view('proveedores.edit', compact('proveedor'));

    }

    public function update(Request $request, Proveedor $proveedor){

        // $Proveedor=Proveedor::findOrFail($Proveedor);
        $data = $request->only('nombre', 'celular', 'correo', 'estado');

        $proveedor->update($data);
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    public function destroy(Proveedor $proveedor){

        $proveedor->delete();
        return back()->with('success', 'Proveedor eliminado correctamente');

    }
}
