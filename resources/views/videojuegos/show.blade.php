<x-app-layout>
    <div class="max-w-4xl mx-auto px-4 mt-8">
        <h1 class="text-2xl font-bold mb-4">Detalles del videojuego: {{ $videojuego }}</h1>

        @if($plataforma)
            <p>Este juego se está mostrando para la plataforma: <strong>{{ $plataforma }}</strong></p>
        @else
            <p>Mostrando el juego en todas sus plataformas disponibles.</p>
        @endif
    </div>
</x-app-layout>