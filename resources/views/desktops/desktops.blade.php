<x-layouts>
    <x-slot:title>
        Desktops - Organiza tus escritorios con facilidad
    </x-slot:title>
    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Mis Escritorios</h1>
    </div>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($desktops as $desktop)
            <div class="p-6 rounded-lg shadow-lg" style="background-color: {{ $desktop->color }};">
                <h2 class="text-xl font-bold text-white">{{ $desktop->name }}</h2>
                <p class="mt-2 text-white">{{ $desktop->description }}</p>
                <a href="{{ route('projects', ['desktop_id' => $desktop->id]) }}"
                    class="mt-4 inline-block px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded">
                    Ver Proyectos
                </a>
            </div>
        @endforeach

        <!-- Tarjeta para crear un nuevo escritorio -->
        <div
            class="p-6 rounded-lg shadow-lg border-2 border-dashed border-gray-400 flex flex-col items-center justify-center">
            <button class="p-4 rounded-full bg-gray-200 hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <p class="mt-4 text-gray-600 font-semibold text-lg">Crear Nuevo Escritorio</p>
        </div>
    </div>
</x-layouts>
