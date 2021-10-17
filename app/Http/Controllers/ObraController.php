<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\User;
use Illuminate\Http\Request;

class ObraController extends Controller
{
    public function index(){

        $obras = Obra::paginate(5);
        return view('obras.index', compact('obras'));

    }

    public function create(){


        $clientes = Cliente::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        $usuarios = User::orderBy('name')->get();

        return view('obras.create',compact('clientes', 'categorias', 'usuarios'));

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20|unique:obras',
            'fechaInicio' => 'required',
            'fechaEntrega' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required|numeric',
            'cliente_id' => 'required',
            'categoria_id' => 'required',
            'usuario_id' => 'required',



        ]);

        Obra::create($request->all());


         return redirect()->route('obras.index')->with('success', 'Obra creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Obra $obra){
        //$usuario = User::findOrFail($id);
        return view('obras.show', compact('obra'));

    }

    public function edit(Obra $obra){

        $clientes = Cliente::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        $usuarios = User::orderBy('name')->get();

        return view('obras.edit', compact('obra','clientes', 'categorias', 'usuarios'));

    }

    public function update(Request $request, Obra $obra){
        $data = $request->only('nombre', 'fechaInicio', 'fechaEntrega', 'estado', 'descripcion', 'cantidad', 'cliente_id', 'categoria_id', 'usuario_id');

        $obra->update($data);
        return redirect()->route('obras.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Obra $obra){

        $obra->delete();
        return back()->with('success', 'marca eliminado correctamente');

    }
}
