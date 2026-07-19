<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Listado de Videojuegos</h1>
            <a href="{{ route('videojuegos.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Nuevo Juego</a>
        </div>

        <!-- Agregamos mb-6 (margin-bottom) para separar la lista de los botones -->
        <ul class="space-y-2 mb-6">
            @foreach ($videojuegos as $juego)
                <li class="bg-white p-4 rounded shadow flex justify-between">
                    <a href="{{ route('videojuegos.show', $juego) }}" class="text-blue-600 font-semibold hover:underline">
                        {{ $juego->titulo }}
                    </a>
                    <span class="text-gray-500 text-sm">{{ $juego->desarrollador }}</span>
                </li>
            @endforeach
        </ul>

        <!-- Aquí se renderizan los enlaces de paginación automáticamente -->
        <div>
            {{ $videojuegos->links() }}
        </div>
    </div>
</x-app-layout>
