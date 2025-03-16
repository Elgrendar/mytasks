<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desktop;

class DesktopController extends Controller
{
    public function index()
    {
        // Obtener todos los escritorios
        $desktops = Desktop::all();

        // Retornar la vista con los escritorios
        return view('desktops.desktops', compact('desktops'));
    }

    public function create()
    {
        // Retornar la vista para crear un escritorio
        return view('desktops.create');
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        // Crear un nuevo escritorio
        Desktop::create($validated);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('desktops.index')->with('success', 'Escritorio creado exitosamente.');
    }
}
