<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Desktop;

class DesktopController extends Controller
{
    public function index()
    {
        // Obtener solo los escritorios del usuario autenticado
        $desktops = Desktop::where('user_id', Auth::id())->get();

        // Retornar la vista con los escritorios
        return view('desktops.view', compact('desktops'));
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

        // Agregar el usuario autenticado como propietario
        Desktop::create([
            'name' => $validated['name'],
            'color' => $validated['color'] ?? null, // Asegurarse de manejar valores nulos
            'description' => $validated['description'] ?? null,
            'user_id' => Auth::id(), // Asociar el escritorio al usuario autenticado
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('desktops.index')->with('success', 'Escritorio creado exitosamente.');
    }
}
