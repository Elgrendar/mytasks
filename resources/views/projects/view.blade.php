<x-layouts>
    <x-slot:title>
        Proyectos - Escritorio Seleccionado
    </x-slot:title>

    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Proyectos del Escritorio: {{ $desktop->name }}</h1>
        <p class="text-gray-600 mt-2">{{ $desktop->description }}</p>
    </div>
    <div class="flex justify-center gap-4 mb-4">
        <!-- Botón para subir al proyecto -->
        <a href="{{ route('desktops.index') }}" {{-- O usa una ruta específica si es necesario --}}
            class="px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white font-semibold text-sm rounded shadow">
            ← Subir a Escritorios
        </a>
    </div>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        <!-- Mostrar proyectos existentes -->
        @foreach ($projects as $project)
            <div class="p-6 rounded-lg shadow-lg flex flex-col items-center justify-between bg-white">
                <div class="text-center">
                    <h2 class="text-xl font-bold text-gray-800">{{ $project->name }}</h2>
                    <p class="mt-2 text-gray-600">{{ $project->description }}</p>
                </div>
                <a href="{{ route('tasks.index', ['project_id' => $project->id]) }}"
                    class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded inline-block">
                    Ver Tareas
                </a>
            </div>
        @endforeach

        <!-- Tarjeta para crear un nuevo proyecto -->
        <div
            class="p-6 rounded-lg shadow-lg border-2 border-dashed border-gray-400 flex flex-col items-center justify-center bg-white">
            <button onclick="window.location='{{ route('projects.create', ['desktop_id' => $desktop->id]) }}';"
                class="p-4 rounded-full bg-gray-200 hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <p class="mt-4 text-gray-600 font-semibold text-lg">Crear Nuevo Proyecto</p>
        </div>
    </div>
</x-layouts>
