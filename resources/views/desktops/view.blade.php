@php
    // Función para determinar si el color es claro u oscuro
    function isLightColor($color)
    {
        // Convertir el color hexadecimal a valores RGB
        $color = ltrim($color, '#');
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));

        // Calcular el brillo (luminosidad)
        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

        // Devolver true si es claro, false si es oscuro
        return $brightness > 128;
    }
@endphp
<x-layouts>
    <x-slot:title>
        Desktops - Organiza tus escritorios con facilidad
    </x-slot:title>
    <div class="text-center my-8">
        <h1 class="text-4xl font-extrabold text-gray-800">Mis Escritorios</h1>
    </div>
    <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($desktops as $desktop)
            @php
                // Decidir los colores de texto y botón según el color de fondo
                $isLight = isLightColor($desktop->color);
                $textColor = $isLight ? 'text-gray-900' : 'text-white';
                $buttonBg = $isLight ? 'bg-gray-800 hover:bg-gray-900' : 'bg-white hover:bg-gray-200';
                $buttonText = $isLight ? 'text-white' : 'text-gray-800';
            @endphp

            <!-- Tarjeta de escritorio -->
            <div class="p-6 rounded-lg shadow-lg flex flex-col items-center justify-between relative"
                style="
        @if ($desktop->file_path !== null) background-image: url('{{ Storage::url($desktop->file_path) }}');
            background-size: cover;
            background-position: center;
        @else
            background-color: {{ $desktop->color }}; @endif
    ">

                <!-- Botón de eliminar  -->
                <form action="{{ route('desktops.destroy', ['desktop' => $desktop->id]) }}" method="POST" class="inline"
                    onsubmit="return confirmDeleteDesktop('{{ $desktop->name }}');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="absolute top-2 right-2 text-white bg-red-500 border border-red-400 rounded-full p-2 shadow-lg hover:bg-red-600"
                        title="Eliminar este escritorio">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5 6h14M10 6v14M14 6v14M4 6h16l-1.5 16H5.5L4 6zm5-3h6a1 1 0 011 1v1H8V4a1 1 0 011-1z" />
                        </svg>
                    </button>
                </form>



                <!-- Contenido del escritorio -->
                <div class="text-center">
                    <h2 class="text-xl font-bold {{ $textColor }}">{{ $desktop->name }}</h2>
                    <p class="mt-2 {{ $textColor }}">{{ $desktop->description }}</p>
                </div>
                <a href="{{ route('projects.index', ['desktop_id' => $desktop->id]) }}"
                    class="mt-4 px-4 py-2 {{ $buttonBg }} {{ $buttonText }} font-semibold text-sm rounded inline-block">
                    Ver Proyectos
                </a>
            </div>
        @endforeach

        <!-- Tarjeta para crear un nuevo escritorio -->
        <div
            class="p-6 rounded-lg shadow-lg border-2 border-dashed border-gray-400 flex flex-col items-center justify-center">
            <button onclick="window.location='{{ route('desktops.create') }}';"
                class="p-4 rounded-full bg-gray-200 hover:bg-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
            </button>
            <p class="mt-4 text-gray-600 font-semibold text-lg">Crear Nuevo Escritorio</p>
        </div>
    </div>
</x-layouts>
@vite('resources/js/app.js')
