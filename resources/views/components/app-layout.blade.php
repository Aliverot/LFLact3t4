<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Videojuegos</title>
    <!-- CDN de TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <header>
        <!-- Aquí podríamos poner una barra de navegación en el futuro -->
    </header>

    <!-- Aquí se inyectará el contenido variable de cada vista -->
    {{ $slot }}

    <footer>
        <!-- Aquí podríamos poner el pie de página -->
    </footer>
</body>
</html>