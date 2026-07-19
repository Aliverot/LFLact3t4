<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-4">Registrar un nuevo Videojuego</h1>
        
        <form action="{{ route('videojuegos.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            @csrf <!-- Directiva de seguridad OBLIGATORIA -->
            
            <div>
                <label class="block font-medium">Título:</label>
                <input type="text" name="titulo" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-medium">Desarrollador:</label>
                <input type="text" name="desarrollador" class="w-full border rounded p-2">
            </div>
            <div>
                <label class="block font-medium">Descripción:</label>
                <textarea name="descripcion" class="w-full border rounded p-2" rows="4"></textarea>
            </div>
            
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Guardar</button>
            <a href="{{ route('videojuegos.index') }}" class="text-gray-500 ml-4">Cancelar</a>
        </form>
    </div>
</x-app-layout>