<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index(){

        $materiales = Material::paginate(5);
        return view('materiales.index', compact('materiales'));

    }

    public function create(){
        $material = new Material();

        // $tipoMaterial = TipoMaterial::orderBy('nombre')->get();
        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();

        return view('materiales.create', compact('tipos', 'marcas', 'proveedores'));
    }
    public function store(Request $request){

        $request->validate([
            'nombre' => 'required|min:3|max:20|unique:materiales',
            'peso' => 'required',
            'tamaño' => 'required',
            'cantidad' => 'required|numeric',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'proveedor_id' => 'required',
            'estado' => 'required',


        ]);


        Material::create($request->all());

         return redirect()->route('materiales.index')->with('success', 'material creada correctamente');
        //return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(Material $material){

        return view('materiales.show', compact('material'));

    }

    public function edit(Material $material){

        $materiales = Material::find($material);

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();

        return view('materiales.edit', compact('material','tipos','marcas','proveedores'));

    }

    public function update(Request $request, Material $material){

        // $material=Material::findOrFail($material);
        $data = $request->only('nombre', 'peso', 'tamaño', 'cantidad', 'tipo_id', 'marca_id', 'proveedor_id', 'estado');

        $material->update($data);
        return redirect()->route('materiales.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(Material $material){

        $material->delete();
        return back()->with('success', ' material eliminado correctamente');

    }
}
