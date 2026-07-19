<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8 bg-white p-6 rounded shadow">
        <h1 class="text-3xl font-bold mb-2">{{ $videojuego->titulo }}</h1>
        <p class="text-gray-600 mb-4"><strong>Desarrollador:</strong> {{ $videojuego->desarrollador }}</p>
        <p class="mb-6">{{ $videojuego->descripcion }}</p>

        <!-- SECCIÓN DE RELACIONES -->
        <div class="mb-8 border-t border-b py-4 bg-gray-50 rounded p-4">
            <div class="grid grid-cols-2 gap-4">
                <!-- Relación Uno a Uno: Detalle -->
                <div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Ficha Técnica</h3>
                    @if($videojuego->detalle)
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li><strong>Motor Gráfico:</strong> {{ $videojuego->detalle->motor_grafico }}</li>
                            <li><strong>Peso:</strong> {{ $videojuego->detalle->peso_gb }} GB</li>
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 italic">No hay detalles técnicos registrados.</p>
                    @endif
                </div>

                <!-- Relación Muchos a Muchos: Plataformas -->
                <div>
                    <h3 class="font-bold text-lg mb-2 text-gray-800">Plataformas</h3>
                    @if($videojuego->plataformas->count() > 0)
                        <div class="flex flex-wrap gap-2">
                            @foreach($videojuego->plataformas as $plataforma)
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $plataforma->nombre }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-sm text-gray-500 italic">Sin plataformas asignadas.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Relación Uno a Muchos: Comentarios -->
        <div class="mb-8">
            <h3 class="font-bold text-lg mb-4 text-gray-800">Comentarios ({{ $videojuego->comentarios->count() }})</h3>
            @forelse($videojuego->comentarios as $comentario)
                <div class="bg-gray-100 p-3 rounded mb-2 border-l-4 border-blue-500">
                    <p class="text-gray-700">{{ $comentario->cuerpo }}</p>
                    <p class="text-xs text-gray-500 mt-1">{{ $comentario->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <p class="text-sm text-gray-500 italic">Sé el primero en comentar este juego.</p>
            @endforelse
        </div>
        <form action="{{ route('comentarios.store', $videojuego) }}" method="POST" class="mt-4 bg-gray-50 p-4 rounded border">
            @csrf
            <label class="block font-medium text-gray-700 mb-2">Añadir un comentario:</label>
            <textarea name="cuerpo" rows="2" class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Escribe tu opinión aquí..."></textarea>
            @error('cuerpo')
                <span class="text-red-500 text-sm block">{{ $message }}</span>
            @enderror
            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Comentar</button>
        </form>
        <!-- FIN SECCIÓN DE RELACIONES -->

        <div class="flex space-x-4">
            <a href="{{ route('videojuegos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Volver</a>
            <a href="{{ route('videojuegos.edit', $videojuego) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Editar</a>
            
            <form id="form-eliminar" action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmarEliminacion()" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Eliminar
                </button>
            </form>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        function confirmarEliminacion() {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción eliminará el videojuego y todos sus comentarios de forma permanente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444', // bg-red-500 de Tailwind
                cancelButtonColor: '#6b7280',  // bg-gray-500 de Tailwind
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true // Pone el botón de cancelar a la izquierda
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario hace clic en "Sí, eliminar", forzamos el envío del formulario
                    document.getElementById('form-eliminar').submit();
                }
            })
        }
    </script>
</x-app-layout>