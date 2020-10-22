<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelo
Use App\Models\User;

//Encriptado de contraseñas
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dni'               => 'required|unique:users|string|max:100',
            'email'             => 'required|unique:users|email|max:255',
            'password'          => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'dni' => $request->name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index', $user->id)
            ->with('info', 'Usuario registrado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);       
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'dni'               => 'required|string|max:100',
            'email'             => 'required|email|max:255',
            'password'          => 'required|string|min:8|confirmed',          
        ]);
        
        $user = User::find($id);
            $user->dni      = $request->dni;
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')
            ->with('info', 'Usuario guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('users.index')
            ->with('info', 'Usuario eliminado');
    }
}
