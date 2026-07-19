<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-4">Editar Videojuego</h1>
        
        <form action="{{ route('videojuegos.update', $videojuego) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            @method('PUT') <!-- Directiva OBLIGATORIA para actualizar -->
            
            <div>
                <label class="block font-medium">Título:</label>
                <!-- Usamos el atributo 'value' para precargar la información -->
                <input type="text" name="titulo" value="{{ $videojuego->titulo }}" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-medium">Desarrollador:</label>
                <input type="text" name="desarrollador" value="{{ $videojuego->desarrollador }}" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block font-medium">Descripción:</label>
                <textarea name="descripcion" class="w-full border rounded p-2" rows="4">{{ $videojuego->descripcion }}</textarea>
            </div>
            
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Actualizar</button>
            <a href="{{ route('videojuegos.show', $videojuego) }}" class="text-gray-500 ml-4">Cancelar</a>
        </form>
    </div>
</x-app-layout>