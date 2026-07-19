<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Catálogo </title>
    <!-- CDN de TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans antialiased min-h-screen flex flex-col">
    
    <!-- Barra de Navegación -->
    <header class="bg-gray-900 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <!-- Logo / Nombre del proyecto -->
            <a href="{{ route('videojuegos.index') }}" class="text-2xl font-black tracking-widest text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 hover:scale-105 transition-transform">
                Juegos
            </a>
            <span class="text-sm text-gray-400 hidden sm:block">Panel de Administración</span>
        </div>
    </header>

    <!-- Contenido principal -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Pie de página -->
    <footer class="bg-gray-900 text-gray-400 text-center py-6 mt-12 border-t border-gray-800">
        <p class="text-sm">&copy; {{ date('Y') }} Plataforma de videojuegos.</p>
    </footer>
</body>
</html>