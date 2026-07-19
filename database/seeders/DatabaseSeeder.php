<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plataforma;
use App\Models\Videojuego;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear Plataformas Reales
        $pc = Plataforma::create(['nombre' => 'PC']);
        $ps5 = Plataforma::create(['nombre' => 'PlayStation 5']);
        $xbox = Plataforma::create(['nombre' => 'Xbox Series X']);
        $switch = Plataforma::create(['nombre' => 'Nintendo Switch']);

        // 2. Lista de 15 Juegos Reales
        $juegos = [
            ['titulo' => 'Elden Ring', 'desarrollador' => 'FromSoftware', 'desc' => 'Un vasto mundo de fantasía oscura lleno de misterios y peligros, con combates intensos y jefes implacables.', 'motor' => 'Propio', 'peso' => 60, 'plats' => [$pc->id, $ps5->id, $xbox->id]],
            ['titulo' => 'Dark Souls III', 'desarrollador' => 'FromSoftware', 'desc' => 'La desafiante y épica conclusión de la aclamada saga de acción RPG. El fuego se apaga y los Señores de la Ceniza despiertan.', 'motor' => 'PhyreEngine', 'peso' => 25, 'plats' => [$pc->id, $ps5->id, $xbox->id]],
            ['titulo' => 'Geometry Dash', 'desarrollador' => 'RobTop', 'desc' => 'Juego de plataformas 2D basado en ritmo con niveles casi imposibles y una comunidad de creadores muy activa.', 'motor' => 'Cocos2d', 'peso' => 1, 'plats' => [$pc->id]],
            ['titulo' => 'The Witcher 3: Wild Hunt', 'desarrollador' => 'CD Projekt Red', 'desc' => 'RPG de mundo abierto donde encarnas a Geralt de Rivia, un cazador de monstruos, en un continente asolado por la guerra.', 'motor' => 'REDengine 3', 'peso' => 50, 'plats' => [$pc->id, $ps5->id, $xbox->id, $switch->id]],
            ['titulo' => 'Minecraft', 'desarrollador' => 'Mojang', 'desc' => 'Explora mundos infinitos generados procedimentalmente y construye cualquier cosa, desde una casa de tierra hasta un gran castillo.', 'motor' => 'Bedrock / Java', 'peso' => 2, 'plats' => [$pc->id, $ps5->id, $xbox->id, $switch->id]],
            ['titulo' => 'Grand Theft Auto V', 'desarrollador' => 'Rockstar Games', 'desc' => 'Tres criminales muy diferentes planean sus propias oportunidades de supervivencia y éxito en la ciudad de Los Santos.', 'motor' => 'RAGE', 'peso' => 110, 'plats' => [$pc->id, $ps5->id, $xbox->id]],
            ['titulo' => 'The Legend of Zelda: Breath of the Wild', 'desarrollador' => 'Nintendo', 'desc' => 'Olvida todo lo que sabes sobre los juegos de Zelda. Entra en un mundo inmenso de descubrimiento, exploración y aventura.', 'motor' => 'Propio', 'peso' => 15, 'plats' => [$switch->id]],
            ['titulo' => 'Hollow Knight', 'desarrollador' => 'Team Cherry', 'desc' => '¡Forja tu propio camino en Hollow Knight! Una aventura épica de acción 2D a través de un vasto reino de insectos y héroes en ruinas.', 'motor' => 'Unity', 'peso' => 9, 'plats' => [$pc->id, $ps5->id, $switch->id]],
            ['titulo' => 'Stardew Valley', 'desarrollador' => 'ConcernedApe', 'desc' => 'Acabas de heredar la vieja granja de tu abuelo en Stardew Valley. Equipado con herramientas de segunda mano, comienzas tu nueva vida.', 'motor' => 'XNA', 'peso' => 1, 'plats' => [$pc->id, $switch->id]],
            ['titulo' => 'Red Dead Redemption 2', 'desarrollador' => 'Rockstar Games', 'desc' => 'Una historia épica sobre la vida en el implacable corazón de Estados Unidos en los albores de la era moderna.', 'motor' => 'RAGE', 'peso' => 120, 'plats' => [$pc->id, $ps5->id, $xbox->id]],
            ['titulo' => 'Hades', 'desarrollador' => 'Supergiant Games', 'desc' => 'Desafía al dios de los muertos y ábrete paso a tajos fuera del Inframundo en este adictivo roguelike de acción.', 'motor' => 'Propio', 'peso' => 15, 'plats' => [$pc->id, $ps5->id, $xbox->id, $switch->id]],
            ['titulo' => 'Cyberpunk 2077', 'desarrollador' => 'CD Projekt Red', 'desc' => 'Un RPG de acción y aventura de mundo abierto ambientado en Night City, una megalópolis obsesionada con el poder y el glamur.', 'motor' => 'REDengine 4', 'peso' => 70, 'plats' => [$pc->id, $ps5->id, $xbox->id]],
            ['titulo' => 'Celeste', 'desarrollador' => 'Maddy Makes Games', 'desc' => 'Ayuda a Madeline a sobrevivir a los demonios de su interior en su viaje hacia la cima de la montaña Celeste. Plataformeo puro.', 'motor' => 'XNA', 'peso' => 2, 'plats' => [$pc->id, $ps5->id, $xbox->id, $switch->id]],
            ['titulo' => 'Terraria', 'desarrollador' => 'Re-Logic', 'desc' => '¡Cava, lucha, explora, construye! Nada es imposible en este juego de aventuras 2D repleto de acción.', 'motor' => 'XNA', 'peso' => 1, 'plats' => [$pc->id, $ps5->id, $xbox->id, $switch->id]],
            ['titulo' => 'Portal 2', 'desarrollador' => 'Valve', 'desc' => 'Secuela del aclamado juego de rompecabezas en primera persona que introduce nuevas mecánicas con portales y físicas.', 'motor' => 'Source', 'peso' => 12, 'plats' => [$pc->id]]
        ];

        foreach ($juegos as $juegoData) {
            // 1. Crear el juego (Str::slug genera la URL amigable automáticamente)
            $juego = Videojuego::create([
                'titulo' => $juegoData['titulo'],
                'slug' => Str::slug($juegoData['titulo']),
                'desarrollador' => $juegoData['desarrollador'],
                'descripcion' => $juegoData['desc'],
            ]);

            // 2. Asignar plataformas (relación muchos a muchos)
            $juego->plataformas()->attach($juegoData['plats']);

            // 3. Crear detalle (relación uno a uno)
            $juego->detalle()->create([
                'motor_grafico' => $juegoData['motor'],
                'peso_gb' => $juegoData['peso']
            ]);
        }
    }
}