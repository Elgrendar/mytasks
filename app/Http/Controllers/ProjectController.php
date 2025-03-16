<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Desktop;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $desktopId = $request->input('desktop_id');
        $desktop = Desktop::findOrFail($desktopId);
        $projects = Project::where('desktop_id', $desktopId)->get();

        return view('projects.projects', compact('desktop', 'projects'));
    }

    public function create(Request $request)
    {
        $desktopId = $request->input('desktop_id');
        $desktop = Desktop::findOrFail($desktopId);

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

        // Crear el proyecto
        Project::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('projects.index', ['desktop_id' => $request->desktop_id])
            ->with('success', 'Proyecto creado exitosamente.');
    }
}
