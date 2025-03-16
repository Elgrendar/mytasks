<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desktop;
use App\Models\Project;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;
    public function index(Request $request)
    {
        // Obtén los escritorios del usuario autenticado
        $desktopId = $request->input('desktop_id');
        $desktop = Desktop::findOrFail($desktopId);

        // Autorizar el acceso al escritorio
        $this->authorize('view', $desktop);

        // Filtrar los proyectos asociados al escritorio
        $projects = $desktop->projects;

        return view('projects.view', compact('desktop', 'projects'));
    }

    public function create(Request $request)
    {
        $desktopId = $request->input('desktop_id');
        $desktop = Desktop::findOrFail($desktopId);

        // Aplica la política para verificar que el escritorio le pertenece al usuario autenticado
        $this->authorize('view', $desktop);

        return view('projects.create', compact('desktop'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'desktop_id' => 'required|exists:desktops,id', // Validar que el escritorio exista
        ]);

        // Obtener el escritorio relacionado
        $desktop = Desktop::findOrFail($validated['desktop_id']);

        // Aplica la política para verificar que el escritorio le pertenece al usuario autenticado
        $this->authorize('view', $desktop);

        // Crear el proyecto
        Project::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('projects.index', ['desktop_id' => $request->desktop_id])
            ->with('success', 'Proyecto creado exitosamente.');
    }
}
