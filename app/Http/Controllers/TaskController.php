<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);
        $tasks = Task::where('project_id', $projectId)->get();

        return view('tasks.tasks', compact('project', 'tasks'));
    }

    public function create(Request $request)
    {
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);

        return view('tasks.create', compact('project'));
    }

    public function update(Request $request)
    {
        // Validar los datos enviados por el formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|in:no_iniciada,en_progreso,finalizada,abandonada',
            'project_id' => 'required|exists:projects,id', // Asegura que el proyecto exista
        ]);

        // Buscar la tarea por su ID (usando hidden input o route binding)
        $task = Task::findOrFail($request->input('task_id'));

        // Actualizar los atributos de la tarea
        $task->name = $validatedData['name'];
        $task->description = $validatedData['description'];
        $task->status = $validatedData['status'];

        // Guardar los cambios
        $task->save();

        // Redireccionar con un mensaje de éxito
        return redirect()
            ->route('tasks.index', ['project_id' => $validatedData['project_id']])
            ->with('success', 'La tarea se actualizó correctamente.');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id', // Validar que el escritorio exista
            'status' => 'required|in:no_iniciada,en_progreso,finalizada,abandonada' // Verificar estado de la tarea

        ]);

        // Crear el proyecto
        Task::create($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('tasks.index', ['project_id' => $request->project_id])
            ->with('success', 'Tarea creada exitosamente.');
    }
    public function markAsCompleted(Request $request, Task $task)
    {
        // Validar y actualizar el estado
        $request->validate([
            'status' => 'required|in:finalizada',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Tarea actualizada correctamente']);
    }

    public function markAsIncompleted(Request $request, Task $task)
    {
        // Validar y actualizar el estado
        $request->validate([
            'status' => 'required|in:no_iniciada',
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Tarea actualizada correctamente']);
    }

    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('project', 'task'));
    }

    public function destroy(Request $request, Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index', ['project_id' => $task->project_id])
            ->with('success', 'Tarea eliminada correctamente.');
    }

    public function updateStatus(Request $request, Task $task)
    {
        $request->validate([
            'status' => 'required|string|in:no_iniciada,en_progreso,finalizada,abandonada',
        ]);

        $task->status = $request->input('status');
        $task->save();

        return response()->json(['message' => 'Estado actualizado correctamente', 'task' => $task], 200);
    }
}
