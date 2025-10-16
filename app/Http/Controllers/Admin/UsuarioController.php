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

        // dd($usuarios);
        // return view ('usuarios.index',['Usuarios' => $Usuarios]);    

        if (!$usuarios) {
            $usuarios = [];
        }

        // $usuarios = User::all(); // Obtener todos los usuarios desde la base de datos
        return view('usuarios.index', compact('usuarios')); // Pasar la variable a la vista

    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
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
            'password' => 'required|string|min:8|',
        ]);

        $newUser = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'password' => bcrypt($request->input('password')), // Asegúrate de hashear la contraseña
        ];
        $this->firebase->getDatabase()->getReference('Usuarios')->push($newUser);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
