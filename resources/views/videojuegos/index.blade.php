<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 mt-8">
        
        <!-- Encabezado y botón nuevo -->
        <div class="flex justify-between items-center mb-8 pb-4 border-b border-gray-300">
            <h1 class="text-3xl font-extrabold text-gray-900">Catálogo de Juegos</h1>
            <a href="{{ route('videojuegos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full shadow-lg transition transform hover:scale-105">
                + Nuevo Juego
            </a>
        </div>

        <!-- Cuadrícula de Tarjetas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-10">
            @forelse ($videojuegos as $juego)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col group border border-gray-100 transform hover:-translate-y-1">
                    
                    <!-- Imagen simulada (Fondo con la letra inicial) -->
                    <div class="h-40 bg-gradient-to-br from-gray-700 to-gray-900 flex items-center justify-center">
                        <span class="text-gray-300 font-bold text-4xl group-hover:scale-125 transition-transform duration-300 opacity-50">
                            {{ strtoupper(substr($juego->titulo, 0, 1)) }}
                        </span>
                    </div>
                    
                    <!-- Información de la tarjeta -->
                    <div class="p-5 flex flex-col flex-grow">
                        <h2 class="text-xl font-bold text-gray-800 mb-1 truncate" title="{{ $juego->titulo }}">
                            {{ $juego->titulo }}
                        </h2>
                        <p class="text-sm text-gray-500 mb-4 font-medium">{{ $juego->desarrollador }}</p>
                        
                        <!-- Botón alineado abajo -->
                        <div class="mt-auto pt-4 border-t border-gray-100">
                            <a href="{{ route('videojuegos.show', $juego) }}" class="block w-full text-center bg-gray-50 hover:bg-blue-50 text-blue-600 border border-gray-200 hover:border-blue-200 font-semibold py-2 rounded-lg transition-colors">
                                Ver Detalles
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Mensaje por si la base de datos está vacía -->
                <div class="col-span-full text-center py-12 text-gray-500 bg-white rounded-lg shadow-sm border border-gray-200">
                    <p class="text-xl">Aún no hay videojuegos registrados en el catálogo.</p>
                </div>
            @endforelse
        </div>

        <!-- Paginación -->
        <div class="mb-8 flex justify-center">
            <div class="bg-white p-2 rounded-lg shadow-sm w-full">
                {{ $videojuegos->links() }}
            </div>
        </div>

    </div>
</x-app-layout>