<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        // Validar los datos del formulario, incluyendo el archivo
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048', // El archivo es opcional
        ]);

        // Inicializar la variable para la ruta del archivo
        $filePath = null;

        // Verificar si se subió un archivo
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads/desktops', 'public'); // Guardar en el disco público
        }

        // Crear el escritorio
        Desktop::create([
            'name' => $validated['name'],
            'color' => $validated['color'] ?? null,
            'description' => $validated['description'] ?? null,
            'user_id' => Auth::id(),
            'file_path' => $filePath, // Guardar la ruta del archivo
        ]);

        // Redireccionar con un mensaje de éxito
        return redirect()->route('desktops.index')->with('success', 'Escritorio creado exitosamente.');
    }

    public function destroy(Desktop $desktop)
    {
        // Verificar que el usuario autenticado sea el propietario
        if ($desktop->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este escritorio.');
        }
        //Eliminamos el archivo del escritorio si existe
        if ($desktop->file_path) {
            Storage::disk('public')->delete($desktop->file_path);
        }
        // Eliminar el escritorio
        $desktop->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('desktops.index')->with('success', 'Escritorio eliminado exitosamente.');
    }
}
