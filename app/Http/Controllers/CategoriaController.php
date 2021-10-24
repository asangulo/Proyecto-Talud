<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){

        $categorias = Categoria::paginate(5);
        return view('categorias.index', compact('categorias'));

    }

    public function create(){

        return view('categorias.create');

    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20|unique:categorias',

        ]);

        Categoria::create($request->all());


         return redirect()->route('categorias.index')->with('success', 'categoria creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Categoria $categoria){
        //$usuario = User::findOrFail($id);
        return view('categorias.show', compact('categoria'));

    }

    public function edit(Categoria $categoria){

        return view('categorias.edit', compact('categoria'));

    }

    public function update(Request $request, Categoria $categoria){

        $categoria->update($request->only('nombre'));
        return redirect()->route('categorias.index')->with('success', 'Categoria  actualizado correctamente');
    }

    public function destroy(Categoria $categoria){

        $categoria->delete();

        return back()->with('success', 'Categoria eliminado correctamente');

    }
}
