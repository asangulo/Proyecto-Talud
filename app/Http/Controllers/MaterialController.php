<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\EntradaMaterial;
use App\Models\Marca;
use App\Models\Material;
use App\Models\Proveedor;
use App\Models\TipoMaterial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    public function store(MaterialRequest $request){

        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|unique:materiales',
        //     'peso' => 'required|min:3|max:10|',
        //     'tamaño' => 'required|min:3|max:10|',
        //     'cantidad' => 'required|numeric',
        //     'tipo_id' => 'required',
        //     'marca_id' => 'required',
        //     'proveedor_id' => 'required',
        //     'estado' => 'required',


        // ]);


        Material::create($request->all());

        Alert::success('Material creado correctamente');



         return redirect()->route('materiales.index');
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

    public function cambiar_estado($id, $estado){
        $material = Material::find($id);
        if ($material == null) {
            Alert::warning("no se encontraron datos", 'espere');
            return redirect()->route('materiales.index');
        }
        $material->update(["estado"=>$estado]);

        Alert()->success('Modificado');
        return redirect()->route('materiales.index');

    }

    public function update(Request $request, Material $material){

        // $material=Material::findOrFail($material);
        $data = $request->only('nombre', 'peso', 'tamaño', 'cantidad', 'tipo_id', 'marca_id', 'proveedor_id', 'estado');

        $material->update($data);

        Alert::success('Material actualizado correctamente');
        return redirect()->route('materiales.index');
    }

    public function destroy(Material $material){

        $material->delete();
        return back()->with('success', ' Material eliminado correctamente');

    }
    public function datatableMateriales(){
        $query=Material::all();
        return datatables($query)
        ->addColumn('opciones',function($query){
            $btnEstado = "";
            if ($query->estado == 1) {
                $btnEstado = ' <a href="/materiales/estado/'.$query->id.'/0" class="btn btn-warning"><i class="glyphicon-remove"></i>Inactivar</a> ';
            }else if ($query->estado == 0){
                $btnEstado = ' <a href="/materiales/estado/'.$query->id.'/1" class="btn  btn-primary"><i class="glyphicon-edit"></i>Activar</a> ';

            }
            return $btnEstado;

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
        ->editColumn('estado',function($query){

            return $query->estado == 1?"Activo":"Inactivo";
        })

        ->rawColumns(['opciones','tipo','marca','proveedor'])
        ->make(true);

    }
}
