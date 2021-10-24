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

        $clientes = Cliente::orderBy('nombre')->get();
        $categorias = Categoria::orderBy('nombre')->get();
        $usuarios = User::orderBy('name')->get();

        $obras = Obra::paginate(10);
        return view('obras.index', compact('obras','clientes', 'categorias', 'usuarios'));

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
            'fechaInicio' => 'required|date',
            'fechaEntrega' => 'required|date',
            'estado' => 'required',
            'descripcion' => 'required|min:5|max:100|',
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
        return redirect()->route('obras.index')->with('success', 'Obra actualizado correctamente');
    }

    public function destroy(Obra $obra){

        $obra->delete();
        return back()->with('success', 'obra eliminado correctamente');

    }

    public static function datatableObras(){
        $query=Obra::all();
        return datatables($query)
        ->addColumn('opciones',function($query){
            return '  ';
        })
        ->addColumn('cliente',function($query){
            $cliente=Cliente::obtenerDato($query->cliente_id);

            return $cliente;
        })
        ->addColumn('categoria',function($query){
            $categoria=Categoria::obtenerDato($query->categoria_id);

            return $categoria;
        })
        ->addColumn('usuario',function($query){
            $usuario=User::obtenerDato($query->usuario_id);

            return $usuario;
        })
        ->rawColumns(['opciones','cliente','categoria','usuario'])
        ->make(true);
    }
}
