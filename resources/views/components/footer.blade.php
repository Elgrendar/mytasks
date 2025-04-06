<footer class="bg-gray-200 text-center text-sm py-2 fixed inset-x-0 bottom-0 shadow">
    <div class="mt-6 text-center">
        <h2 class="text-xl font-bold text-red-600">
            {{ env('APP_DEBUG') == true ? 'Este servidor es una demo y los datos se pueden borrar periodicamente' : '' }}</h2>
    </div>
    <h3 class="font-semibold">👨‍💻 Desarrollado por
        <a href="https://rafacampanero.es" target="_blank" class="text-blue-600">Rafa Campanero</a> Versión
        {{ env('APP_VERSION') }}
    </h3>
    <p class="text-gray-500">
        Creando soluciones innovadoras para mejorar la productividad.
    </p>
</footer>
