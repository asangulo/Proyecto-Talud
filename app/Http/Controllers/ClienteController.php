<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){

        $clientes = Cliente::paginate(5);
        return view('clientes.index', compact('clientes'));

    }

    public function create(){

        return view('clientes.create');

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20',
            'correo' => 'required|email|unique:clientes',
            'clave' => 'required|numeric',

        ]);

        Cliente::create($request->all());


         return redirect()->route('clientes.index')->with('success', 'cliente creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Cliente $cliente){
        //$usuario = User::findOrFail($id);
        return view('clientes.show', compact('cliente'));

    }

    public function edit(Cliente $cliente){

        return view('clientes.edit', compact('cliente'));

    }

    public function update(Request $request, Cliente $cliente){

        $data = $request->only('nombre', 'peso', 'tamaño', 'cantidad', 'tipo_id', 'marca_id', 'proveedor_id', 'estado');


        $cliente->update();
        return redirect()->route('clientes.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Cliente $cliente){

        $cliente->delete();
        return back()->with('success', 'cliente eliminado correctamente');

    }
}
