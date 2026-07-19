<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-4">Listado principal de Videojuegos</h1>

        <!-- Usando el Componente Anónimo (x-alert) -->
        <x-alert type="info" class="mb-4">
            <x-slot name="title">
                Alerta de Inventario
            </x-slot>
            Aún no hay videojuegos registrados en la base de datos.
        </x-alert>

        <!-- Usando el Componente de Clase (x-alert2) -->
        <x-alert2 type="warning" class="mb-4">
            <x-slot name="title">
                Mantenimiento
            </x-slot>
            Los servidores de la plataforma están en mantenimiento.
        </x-alert2>

        <p>Aquí mostraremos la tabla con todos los juegos más adelante.</p>
    </div>
</x-app-layout>