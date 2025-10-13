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

     $Usuarios = $this->firebase->getDatabase()->getReference('Usuarios')->getValue();
   // return view ('usuarios.index',['Usuarios' => $Usuarios]);    

     if (!$Usuarios) {
         $Usuarios = [];
         }
    
         $usuarios = User::all(); // Obtener todos los usuarios desde la base de datos
    return view('usuarios.index', compact('usuarios')); // Pasar la variable a la vista
    
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
