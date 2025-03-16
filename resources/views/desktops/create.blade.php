<x-layouts>
    <x-slot:title>
        Desktops - Organiza tus escritorios con facilidad
    </x-slot:title>

    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Crear Nuevo Escritorio</h1>
    </div>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <form action="{{ route('desktops.store') }}" method="POST">
            @csrf
            <!-- Nombre del Escritorio -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Escritorio</label>
                <input type="text" name="name" id="name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       placeholder="Escribe el nombre del escritorio" required>
            </div>

            <!-- Color del Escritorio -->
            <div class="mb-4">
                <label for="color" class="block text-sm font-medium text-gray-700">Color del Escritorio</label>
                <input type="color" name="color" id="color"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                       value="#ffffff">
            </div>

            <!-- Descripción del Escritorio -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                          placeholder="Escribe una descripción opcional"></textarea>
            </div>

            <!-- Botón de Enviar -->
            <div class="mt-6">
                <button type="submit"
                        class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded-md shadow-sm">
                    Crear Escritorio
                </button>
            </div>
        </form>
    </div>
</x-layouts>
