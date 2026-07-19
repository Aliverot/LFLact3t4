<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8 bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-2">{{ $videojuego->titulo }}</h1>
        <p class="text-gray-600 mb-4"><strong>Desarrollador:</strong> {{ $videojuego->desarrollador }}</p>
        <p class="mb-6">{{ $videojuego->descripcion }}</p>

        <div class="flex space-x-4">
            <a href="{{ route('videojuegos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            <a href="{{ route('videojuegos.edit', $videojuego) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
            
            <!-- El botón de eliminar debe ser un formulario para usar el método DELETE -->
            <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este juego?');">
                @csrf
                @method('DELETE') <!-- Directiva para falsear el método POST a DELETE -->
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
            </form>
        </div>
    </div>
</x-app-layout>