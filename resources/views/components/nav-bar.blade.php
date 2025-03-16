<nav x-data="{ open: false }" class="bg-gray-100 shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logotipo con chincheta -->
        <a class="text-lg font-bold text-blue-600 flex items-center space-x-2" href="/">
            <span>📌</span>
            <span>MyTask</span>
        </a>

        <!-- Botón para menú responsive -->
        <button @click="open = !open" class="lg:hidden flex items-center text-gray-600 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>

        <!-- Contenido del menú -->
        <div :class="{ 'translate-x-full': !open, 'translate-x-0': open }"
            class="absolute top-0 right-0 w-2/3 max-w-xs h-screen bg-white shadow-lg transform transition-transform duration-300 lg:relative lg:translate-x-0 lg:w-auto lg:max-w-full lg:h-auto lg:flex lg:items-center lg:justify-between lg:bg-transparent">
            <!-- Opciones del Menú -->
            <ul
                class="flex flex-col items-start lg:flex-row lg:items-center space-y-6 lg:space-y-0 lg:space-x-6 p-4 lg:p-0">
                @auth
                    <li>
                        <x-responsive-nav-link href="{{ route('desktops.index') }}" :active="request()->routeIs('desktops.index')">
                            {{ __('Escritorios') }}
                        </x-responsive-nav-link>
                    </li>
                @endauth

                @guest
                    <li>
                        <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                            {{ __('Iniciar Sesión') }}
                        </x-responsive-nav-link>
                    </li>
                @endguest
            </ul>

            <!-- Sección del Usuario -->
            @auth
                <div
                    class="p-4 lg:p-0 flex flex-col items-start lg:flex-row lg:items-center lg:space-x-4 space-y-6 lg:space-y-0 border-t lg:border-t-0">
                    <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="text-gray-800 hover:text-blue-600 font-medium px-4 py-2 rounded-md transition">
                                {{ __('Salir') }}
                            </button>
                        </form>

                    </form>
                </div>
            @endauth
        </div>
    </div>
</nav>
