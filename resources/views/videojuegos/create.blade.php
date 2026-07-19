<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-4">Registrar un nuevo Videojuego</h1>
        
        <form action="{{ route('videojuegos.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
            @csrf
            
            <div>
                <label class="block font-medium">Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}" class="w-full border rounded p-2">
                @error('titulo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label class="block font-medium">Slug (URL amigable):</label>
                <input type="text" name="slug" value="{{ old('slug') }}" class="w-full border rounded p-2">
                @error('slug') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            
            <div>
                <label class="block font-medium">Desarrollador:</label>
                <input type="text" name="desarrollador" value="{{ old('desarrollador') }}" class="w-full border rounded p-2">
                @error('desarrollador') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">Descripción:</label>
                <textarea name="descripcion" class="w-full border rounded p-2" rows="4">{{ old('descripcion') }}</textarea>
                @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- RELACIÓN 1 a 1: DETALLE -->
            <div class="border-t border-gray-200 pt-4 mt-4">
                <h3 class="font-bold text-lg mb-2 text-gray-700">Ficha Técnica (Opcional)</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Motor Gráfico:</label>
                        <input type="text" name="motor_grafico" value="{{ old('motor_grafico') }}" class="w-full border rounded p-2" placeholder="Ej: Unreal Engine 5">
                        <!-- Mensaje de error para motor gráfico -->
                        @error('motor_grafico') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block font-medium">Peso del juego (GB):</label>
                        <input type="number" step="0.1" name="peso_gb" value="{{ old('peso_gb') }}" class="w-full border rounded p-2" placeholder="Ej: 85">
                        <!-- Mensaje de error para el peso -->
                        @error('peso_gb') <span class="text-red-500 text-sm block mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

            <!-- RELACIÓN MUCHOS A MUCHOS: PLATAFORMAS -->
            <div class="border-t border-gray-200 pt-4 mt-4 mb-4">
                <h3 class="font-bold text-lg mb-2 text-gray-700">Plataformas Disponibles</h3>
                <div class="flex flex-wrap gap-4">
                    @foreach($plataformas as $plataforma)
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="plataformas[]" value="{{ $plataforma->id }}" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            <span class="ml-2 text-gray-700">{{ $plataforma->nombre }}</span>
                        </label>
                    @endforeach
                </div>
                <!-- Mensaje de error general para el array de plataformas -->
                @error('plataformas') <span class="text-red-500 text-sm block mt-2 font-bold">{{ $message }}</span> @enderror
            </div>
            
            <div class="pt-4">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Guardar</button>
                <a href="{{ route('videojuegos.index') }}" class="text-gray-500 ml-4 hover:underline">Cancelar</a>
            </div>
        </form>
    </div>
</x-app-layout>