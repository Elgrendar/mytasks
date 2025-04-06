<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TaskController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);

        // Verificar si el usuario tiene permiso para acceder al proyecto
        $this->authorize('view', $project);

        $tasks = $project->tasks;

        return view('tasks.view', compact('project', 'tasks'));
    }

    public function create(Request $request)
    {
        $projectId = $request->input('project_id');
        $project = Project::findOrFail($projectId);

        // Verificar si el usuario tiene permiso para acceder al proyecto
        $this->authorize('view', $project);

        return view('tasks.create', compact('project'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'project_id' => 'required|exists:projects,id', // Validar que el proyecto exista
            'status' => 'required|in:no_iniciada,en_progreso,finalizada,abandonada'
        ]);

        // Obtener el proyecto asociado
        $project = Project::findOrFail($validated['project_id']);

        // Verificar si el usuario tiene permiso para agregar tareas al proyecto
        $this->authorize('view', $project);

        // Crear la tarea
        Task::create($validated);

        return redirect()->route('tasks.index', ['project_id' => $project->id])
            ->with('success', 'Tarea creada exitosamente.');
    }

    public function edit(Project $project, Task $task)
    {
        // Verifica que la tarea pertenezca al proyecto
        if ($task->project_id !== $project->id) {
            abort(404, 'La tarea no pertenece al proyecto especificado.');
        }

        // Retorna la vista de edición
        return view('tasks.edit', compact('project', 'task'));
    }


    public function update(Request $request, Task $task)
    {
        $task = Task::with('project.desktop')->find($task->id);
        // Verificar si el usuario tiene permiso para actualizar la tarea
        $this->authorize('update', $task);

        // Validar los datos enviados por el formulario
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'status' => 'required|string|in:no_iniciada,en_progreso,finalizada,abandonada',
        ]);

        // Actualizar los atributos de la tarea
        $task->update($validatedData);

        return redirect()
            ->route('tasks.index', ['project_id' => $task->project_id])
            ->with('success', 'La tarea se actualizó correctamente.');
    }

    public function destroy(Request $request, Task $task)
    {
        // Verificar si el usuario tiene permiso para eliminar la tarea
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index', ['project_id' => $task->project_id])
            ->with('success', 'Tarea eliminada correctamente.');
    }

    public function markAsCompleted(Request $request, Task $task)
    {
        // Verificar si el usuario tiene permiso para marcar la tarea como completada
        $this->authorize('update', $task);

        $task->status = 'finalizada';
        $task->save();

        return redirect()->route('tasks.index', ['project_id' => $task->project_id])
            ->with('success', 'Tarea marcada como completada.');
    }

    public function markAsIncompleted(Request $request, Task $task)
    {
        // Verificar si el usuario tiene permiso para marcar la tarea como incompleta
        $this->authorize('update', $task);

        $task->status = 'en_progreso';
        $task->save();

        return redirect()->route('tasks.index', ['project_id' => $task->project_id])
            ->with('success', 'Tarea marcada como incompleta.');
    }
}
