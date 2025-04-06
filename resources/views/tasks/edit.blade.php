<x-layouts>
    <x-slot:title>
        Editar Tarea
    </x-slot:title>

    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Editar Tarea</h1>
        <p class="text-gray-600 mt-2">Editar tarea del proyecto: <strong>{{ $project->name }}</strong></p>
    </div>

    <!-- Ajuste del margen inferior -->
    <div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg mb-24">
        <form action="{{ route('tasks.update',['task'=>$task->id]) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <!-- Campo para el nombre -->
            <div>
                <label for="name" class="block text-lg font-bold text-gray-800 mb-2">Nombre de la Tarea</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Título de la tarea" required value="{{ $task->name }}">
            </div>

            <!-- Campo para la descripción -->
            <div>
                <label for="description" class="block text-lg font-bold text-gray-800 mb-2">Descripción</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="Descripción de la tarea (opcional)">{{$task->description}}</textarea>
            </div>

            <!-- Selector de estado -->
            <div>
                <label for="status" class="block text-lg font-bold text-gray-800 mb-2">Estado</label>
                <select id="status" name="status"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="no_iniciada" {{$task->status == 'no_iniciada'?'selected':''}}>No Iniciada</option>
                    <option value="en_progreso" {{$task->status == 'en_progreso'?'selected':''}}>En Progreso</option>
                    <option value="finalizada" {{$task->status == 'finalizada'?'selected':''}}>Finalizada</option>
                    <option value="abandonada" {{$task->status == 'abandonada'?'selected':''}}>Abandonada</option>
                </select>
            </div>
            <!-- Campo oculto para relacionar la tarea con el proyecto -->
            <input type="hidden" name="project_id" value="{{ $project->id }}">

            <!-- Botones -->
            <div class="flex justify-center gap-4">
                <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}"
                   class="px-6 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold rounded-lg shadow">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg shadow">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-layouts>
