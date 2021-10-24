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

        $tipos = TipoMaterial::orderBy('nombre')->get();
        $marcas = Marca::orderBy('nombre')->get();
        $proveedores = Proveedor::orderBy('nombre')->get();

        $materiales = Material::paginate(10);
        return view('materiales.index', compact('materiales','tipos', 'marcas', 'proveedores'));

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
            'peso' => 'required|min:3|max:10|',
            'tamaño' => 'required|min:3|max:10|',
            'cantidad' => 'required|numeric',
            'tipo_id' => 'required',
            'marca_id' => 'required',
            'proveedor_id' => 'required',
            'estado' => 'required',


        ]);


        Material::create($request->all());

         return redirect()->route('materiales.index')->with('success', 'Material creado correctamente');
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
        return redirect()->route('materiales.index')->with('success', 'Material actualizado correctamente');
    }

    public function destroy(Material $material){

        $material->delete();
        return back()->with('success', ' Material eliminado correctamente');

    }
    public function datatableMateriales(){
        $query=Material::all();
        return datatables($query)
        ->addColumn('opciones',function($query){
            $html='';


            return $html;
        })
        ->addColumn('tipo',function($query){
            $tipo=TipoMaterial::obtenerTipo($query->tipo_id);

            return $tipo;
        })
        ->addColumn('marca',function($query){
            $marca=Marca::obtenerMarca($query->marca_id);

            return $marca;
        })
        ->addColumn('proveedor',function($query){
            $proveedor=Proveedor::obtenerProveedor($query->proveedor_id);

            return $proveedor;
        })
        ->rawColumns(['opciones','tipo','marca','proveedor'])
        ->make(true);

    }
}
