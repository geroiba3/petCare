<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FirebaseService;

class VeterinariaController extends Controller
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
         $veterinaria = $this->firebase->getDatabase()->getReference('Veterinaria')->getValue();


        if (!$veterinaria) {
            $veterinaria = [];
        }

        
        return view('admin.veterinaria.index', compact('veterinaria')); // Pasar la variable a la vista

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.veterinaria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'hora_apertura' => 'required|date_format:H:i',
            'hora_cierre' => 'required|date_format:H:i|after:hora_apertura',
        ]);

        $newVeterinaria = [
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'hora_apertura' => $request->input('hora_apertura'),
            'hora_cierre' => $request->input('hora_cierre'),
        ];
        $this->firebase->getDatabase()->getReference('Veterinaria')->push($newVeterinaria);
        return redirect()->route('veterinaria.index')->with('success', 'Veterinaria creada exitosamente.');
        
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
        $veterinaria = $this->firebase->getDatabase()->getReference('Veterinaria/'.$id)->getValue();

        if (!$veterinaria) {
            return redirect()->route('veterinaria.index')->with('error', 'Veterinaria no encontrada.');
        }

        return view('admin.veterinaria.edit', compact('veterinaria', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        request()->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:20',
            'hora_apertura' => 'required|date_format:H:i',
            'hora_cierre' => 'required|date_format:H:i|after:hora_apertura',
        ]);

        $updatedVeterinaria = [
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'hora_apertura' => $request->input('hora_apertura'),
            'hora_cierre' => $request->input('hora_cierre'),
        ];

        $this->firebase->getDatabase()->getReference('Veterinaria/'.$id)->update($updatedVeterinaria);

        return redirect()->route('veterinaria.index')->with('success', 'Veterinaria actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
