<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirebaseService;
use App\Models\User;

class UsuarioController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = $this->firebase->getDatabase()->getReference('Usuarios')->getValue();


        if (!$usuarios) {
            $usuarios = [];
        }

        
        return view('admin.usuarios.index', compact('usuarios')); // Pasar la variable a la vista


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:20',
            'rol' => 'required|in:administrador,usuario,veterinario',
            'password' => 'required|string|min:8|',
           
        ]);

        $newUser = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'rol' => $request->input('rol'),
            'password' => bcrypt($request->input('password')), // Asegúrate de hashear la contraseña
        ];
        $this->firebase->getDatabase()->getReference('Usuarios')->push($newUser);
        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = $this->firebase->getDatabase()->getReference('Usuarios/' . $id)->getValue();
        // dd($usuario);
        return view('admin.usuarios.edit', compact('usuario', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:20',
            'rol' => 'required|in:administrador,usuario,veterinario',
            'password' => 'nullable|string|min:8',
            // La contraseña puede ser opcional en la actualización
        ]);
        $newUser = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'rol' => $request->input('rol'),
            'password' => $request->input('password') ? bcrypt($request->input('password')) : null,
        ];
        $this->firebase->getDatabase()->getReference('Usuarios/' . $id)->set($newUser);

        return redirect()->route('admin.usuarios.index')->with('success', 'Usuario actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

