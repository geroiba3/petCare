<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirebaseService;

class MascotaController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function index()
    {
        $mascota = $this->firebase->getDatabase()->getReference('Mascota')->getValue();
       

        if (!$mascota) {
            $mascota = [];
        }    
    
        return view('mascota.index', compact('mascota')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
    'nombre' => 'required|string|max:100',
    'especie' => 'required|string|max:50',
    'raza' => 'nullable|string|max:100',
    'sexo' => 'required|in:macho,hembra',
    'fecha_nacimiento' => 'nullable|date',
    'peso' => 'nullable|numeric|min:0',

]);
    $newMascota = [
        'nombre' => $request->input('nombre'),
        'especie' => $request->input('especie'),
        'raza' => $request->input('raza'),
        'sexo' => $request->input('sexo'),
        'fecha_nacimiento' => $request->input('fecha_nacimiento'),
        'peso' => $request->input('peso'),
        
    ];
    $this->firebase->getDatabase()->getReference('Mascota')->push($newMascota);
        return redirect()->route('mascota.index')->with('success', 'Mascota creado exitosamente.');

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
