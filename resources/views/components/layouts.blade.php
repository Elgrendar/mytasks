<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <!-- resources/views/livewire/nav-bar.blade.php -->
    <div>
        <nav class="bg-gray-100 shadow">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <!-- Logotipo con chincheta -->
                <a class="text-lg font-bold text-blue-600" href="#">
                    📌 MyTask
                </a>

                <!-- Botón para menú responsive -->
                <button class="lg:hidden flex items-center text-gray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <!-- Contenido del menú -->
                <div class="hidden lg:flex w-full justify-between">
                    <!-- 🔴 MENÚ CENTRADO -->
                    <ul class="flex space-x-4">
                        <li><a class="text-gray-600 hover:text-blue-600" href="/"><i class="bi bi-house-door"></i> Inicio</a></li>
                        <li><a class="text-gray-600 hover:text-blue-600" href={{route('desktops')}}><i class="bi bi-columns"></i> Escritorios</a></li>
                        <li><a class="text-gray-600 hover:text-blue-600" href={{route('projects')}}><i class="bi bi-briefcase"></i> Proyectos</a></li>
                        <li><a class="text-gray-600 hover:text-blue-600" href={{route('tasks')}}><i class="bi bi-card-checklist"></i> Tareas</a></li>
                    </ul>

                    <!-- 🔴 MENÚ DE USUARIO A LA DERECHA -->
                    <ul class="flex space-x-4">
                        <li><a class="text-gray-600 hover:text-blue-600" href="#"><i class="bi bi-person"></i> Mi perfil</a></li>
                        <li><a class="text-gray-600 hover:text-blue-600" href="#"><i class="bi bi-box-arrow-right"></i> Salir</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    {{$slot}}

    <div>
        <footer class="bg-gray-200 text-center text-sm py-2 fixed inset-x-0 bottom-0 shadow">
            <h3 class="font-semibold">👨‍💻 Desarrollado por
                <a href="https://rafacampanero.es" target="_blank" class="text-blue-600">Rafa Campanero</a>
            </h3>
            <p class="text-gray-500">
                Creando soluciones innovadoras para mejorar la productividad.
            </p>
        </footer>
    </div>
</body>

</html>

