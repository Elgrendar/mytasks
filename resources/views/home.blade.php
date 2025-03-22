<x-layouts>
    <x-slot name="title">
        My Tasks - Organiza tus proyectos con facilidad
    </x-slot>

    <div class="container mx-auto mt-10 px-4">
        <div class="text-center">
            <h1 class="text-2xl font-bold text-blue-600">📌 MyTask - Organiza tus proyectos con facilidad</h1>
            <p class="text-gray-500">La herramienta definitiva para gestionar tus escritorios, proyectos y tareas de forma eficiente y sencilla.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white shadow rounded-lg p-4">
                <h5 class="text-green-500 font-semibold"><i class="bi bi-check-circle"></i> Escritorios Personalizados</h5>
                <p class="text-gray-600">Crea y gestiona múltiples escritorios con imágenes o colores personalizados.</p>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <h5 class="text-blue-500 font-semibold"><i class="bi bi-list-task"></i> Gestión de Tareas</h5>
                <p class="text-gray-600">Organiza tus tareas con facilidad, asigna prioridades y marca el progreso.</p>
            </div>
            <div class="bg-white shadow rounded-lg p-4">
                <h5 class="text-yellow-500 font-semibold"><i class="bi bi-people"></i> Colaboración</h5>
                <p class="text-gray-600">Comparte escritorios con tu equipo y trabaja en proyectos conjuntos.</p>
            </div>
        </div>

        <div class="mt-12 text-center">
            <h2 class="text-xl font-bold text-gray-800">🛠️ Desarrollado con tecnología de vanguardia</h2>
            <p class="text-gray-500">MyTask está construido con las mejores herramientas para garantizar rendimiento y escalabilidad.</p>

            <div class="flex justify-center space-x-4 mt-4">
                <span class="bg-red-500 text-white px-3 py-2 rounded-lg"><i class="bi bi-laravel"></i> Laravel</span>
                <span class="bg-blue-500 text-white px-3 py-2 rounded-lg"><i class="bi bi-bootstrap"></i> Livewire</span>
                <span class="bg-green-500 text-white px-3 py-2 rounded-lg"><i class="bi bi-database"></i> MariaDB</span>
            </div>
        </div>
    </div>
</x-layouts>
