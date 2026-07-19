<x-mail::message>
# ¡Un nuevo título se ha unido al catálogo!

Se ha registrado **{{ $videojuego->titulo }}** en el sistema con los siguientes detalles:

- **Desarrollador:** {{ $videojuego->desarrollador }}
- **Motor Gráfico:** {{ $videojuego->detalle->motor_grafico ?? 'No especificado' }}
- **Peso:** {{ $videojuego->detalle->peso_gb ? $videojuego->detalle->peso_gb . ' GB' : 'No especificado' }}

**Plataformas confirmadas:**
@forelse($videojuego->plataformas as $plataforma)
- {{ $plataforma->nombre }}
@empty
- Ninguna plataforma asignada aún.
@endforelse

<x-mail::panel>
**Descripción del juego:**
{{ $videojuego->descripcion }}
</x-mail::panel>

<x-mail::button :url="route('videojuegos.show', $videojuego)" color="primary">
Ver en la plataforma
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>