<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){

        $usuarios = User::paginate(5);
        return view('usuarios.index', compact('usuarios'));

    }

    public function create(){

        return view('usuarios.create');

    }

    public function store( UserCreateRequest $request){

        // $request->validate([
        //     'name' => 'required|min:3|max:10',
        //     'email' => 'required|email|unique:users',
        //     'password' =>'required',

        // ]);


        User::create($request->only('name','email')
        + [
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect()->route('usuarios.index')->with('success', 'usuario creado correctamente');
        // return redirect()->back(); // QUE CUANDO CREAA NOS REDIRECCIONE A LA VITA

    }

    public function show(User $usuario){
        //$usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));

    }

    public function edit(User $usuario){

        return view('usuarios.edit', compact('usuario'));

    }

    public function update(UserEditRequest $request, User $usuario){

        // $usuario=User::findOrFail($id);
        $data = $request->only('name', 'email');
        $password=$request->input('password');
        if($password)
        $data['password'] = bcrypt($password);
        // if(trim($request->password)==''){
        //     $data=$request->except('password');
        // }
        // else{
        //     $data=$request->all();
        //     $data['password']=bcrypt($request->password);
        // }

        $usuario->update($data);
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $usuario){

        $usuario->delete();
        return back()->with('success', 'Usuario eliminado correctamente');

    }
}
