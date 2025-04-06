<x-layouts>
    <x-slot:title>
        Editando Escritorio
    </x-slot:title>
    <!-- Enlace al CSS -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">{{ $desktop->name }}</h1>
    </div>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <form action="{{ route('desktops.update', ['desktop' => $desktop->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Nombre del Escritorio -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Escritorio</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    placeholder="Escribe el nombre del escritorio" value="{{ $desktop->name }}" required>
            </div>

            <!-- Color del Escritorio -->
            <div class="mb-4">
                <label for="color" class="block text-sm font-medium text-gray-700">Color del Escritorio</label>
                <input type="color" name="color" id="color"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    value="{{ $desktop->color }}">
            </div>

            <!-- Descripción del Escritorio -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    placeholder="Escribe una descripción opcional">{{ $desktop->description }}</textarea>
            </div>
            <!-- Actualizar imagen del Escritorio -->
            <div class="justify-center">
                <!-- Mostrar el archivo actual -->
                <div class="flex justify-center items-center">
                    <!-- Mostrar miniatura si hay un archivo -->
                    @if ($desktop->file_path)
                        <a href="{{ asset($desktop->file_path) }}" target="_blank">
                            <img src="{{ asset($desktop->file_path) }}" alt="Miniatura del archivo"
                                class="w-24 h-24 object-cover rounded border border-gray-300 shadow-md">
                        </a>
                    @endif
                </div>
                <div class="file-input-container justify-center my-3">
                    <label for="file" class="file-label">
                        Cambiar imagen
                    </label>
                    <input type="file" name="file" id="file" class="hidden" onchange="updateFileName(this)">
                    @if (!$desktop->file_path)
                        <span id="file-name" class="file-name">Ningún archivo seleccionado</span>
                    @endif
                </div>
            </div>
            <!-- Botón de Enviar -->
            <div class="mt-6">
                <button type="submit"
                    class="w-full px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold text-sm rounded-md shadow-sm">
                    Actualizar Escritorio
                </button>
            </div>
        </form>
    </div>
    <!-- Enlace al JS -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</x-layouts>
