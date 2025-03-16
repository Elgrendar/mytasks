<x-layouts>
    <x-slot:title>
        Lista de Tareas - Proyecto Seleccionado
    </x-slot:title>

    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Lista de Tareas</h1>
        <p class="text-gray-600 mt-2">Tareas del proyecto: <strong>{{ $project->name }}</strong></p>
    </div>

    <!-- Botones centrados para subir al proyecto y agregar tarea -->
    <div class="flex justify-center gap-4 mb-4">
        <!-- Botón para subir al proyecto -->
        <a href="{{ route('projects.index',['desktop_id' => $project->desktop_id]) }}" {{-- O usa una ruta específica si es necesario --}}
            class="px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold text-sm rounded shadow">
            ← Subir al Proyecto
        </a>

        <!-- Botón para agregar tarea -->
        <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}"
            class="px-3 py-1 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded shadow">
            + Agregar Tarea
        </a>
    </div>

    <!-- Tabla de tareas -->
    <div class="max-w-full bg-white p-4 rounded-lg shadow-lg mb-16">
        <table class="w-full border-collapse text-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-800">
                    <th class="px-2 py-1 text-left border border-gray-300">Nombre</th>
                    <th class="px-2 py-1 text-left border border-gray-300">Descripción</th>
                    <th class="px-2 py-1 text-left border border-gray-300">Estado</th>
                    <th class="px-2 py-1 text-left border border-gray-300">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $index => $task)
                    <tr id="task-{{ $task->id }}"
                        class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 ">
                        <!-- Al hacer clic en el nombre, se actualiza visualmente y en la base de datos -->
                        <td class="px-2 py-1 border border-gray-300 cursor-pointer task-name {{ $task->status == 'finalizada' ? 'line-through text-gray-500' : '' }}"
                            onclick="toggleTask({{ $task->id }}, '{{ $task->status }}')">
                            {{ $task->name }}
                        </td>
                        <td class="px-2 py-1 border border-gray-300 {{ $task->status == 'finalizada' ? 'line-through text-gray-500' : '' }}">{{ $task->description }}</td>
                        <td class="px-2 py-1 border border-gray-300 task-status">
                            <select id="status-{{ $task->id }}" name="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                onchange="updateTaskStatus({{ $task->id }}, this.value)" {{ $task->status == 'finalizada' ? 'disabled':''}}>
                                <option value="no_iniciada" {{ $task->status === 'no_iniciada' ? 'selected' : '' }}>No Iniciada</option>
                                <option value="en_progreso" {{ $task->status === 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                <option value="finalizada" {{ $task->status === 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                                <option value="abandonada" {{ $task->status === 'abandonada' ? 'selected' : '' }}>Abandonada</option>
                            </select>
                        </td>
                        <td class="px-2 py-1 border border-gray-300 text-center">
                            <div class="flex justify-evenly items-center">
                                <!-- Botón de Editar -->
                                <a href="{{ route('tasks.edit', ['project' => $project->id, 'task' => $task->id]) }}"
                                    class="px-4 py-2 bg-blue-500 text-white font-bold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                    Editar
                                </a>

                                <!-- Botón de Eliminar -->
                                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST"
                                    class="inline" onsubmit="return confirmDelete('{{ $task->name }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white font-bold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts>
@vite('resources/js/app.js')
