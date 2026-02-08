<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FestivalHistorique;
use App\Models\FestivalVision;

class FestivalHistoriqueVisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Historique
        $historiqueData = [
            [
                'year' => '2008 - La Genèse',
                'title' => 'Naissance de l\'idée',
                'description' => 'Naissance de l\'idée par un groupe de jeunes passionnés d\'Adjamé, désireux de changer l\'image de leur commune.',
                'image' => 'assets/img/history/2008.jpg',
            ],
            [
                'year' => '2010 - Première Édition',
                'title' => 'Lancement officiel',
                'description' => 'Lancement officiel du premier FESCAD avec 3 jours de festivités et plus de 2000 participants.',
                'image' => 'assets/img/history/2010.jpg',
            ],
            [
                'year' => '2015 - L\'Expansion',
                'title' => 'Ouverture internationale',
                'description' => 'Le festival s\'ouvre à l\'international avec la participation d\'artistes venus de la sous-région.',
                'image' => 'assets/img/history/2015.jpg',
            ],
            [
                'year' => 'Aujourd\'hui',
                'title' => 'Une Référence',
                'description' => 'Le FESCAD est devenu l\'un des plus grands événements culturels d\'Abidjan, attirant des milliers de visiteurs chaque année.',
                'image' => 'assets/img/history/today.jpg',
            ],
        ];

        foreach ($historiqueData as $data) {
            FestivalHistorique::create($data);
        }

        // 2. Vision & Mission
        FestivalVision::create([
            'vision_title' => 'Notre Vision',
            'vision_text' => 'Faire d\'Adjamé un pôle d\'excellence culturelle et artistique en Afrique de l\'Ouest.

Nous rêvons d\'une commune où la culture est un vecteur de paix, de cohésion sociale et de développement économique. Une Adjamé fière de son identité, ouverte sur le monde et capable d\'inspirer les générations futures.',
            'vision_image' => 'assets/img/vision.png',

            'mission_title' => 'Notre Mission',
            'mission_text' => 'Promouvoir, valoriser et soutenir la création artistique sous toutes ses formes.',
            'mission_points' => [
                'Offrir une plateforme d\'expression aux jeunes talents.',
                'Renforcer l\'attractivité touristique de la commune.',
                'Créer des opportunités économiques pour les artisans et commerçants.',
                'Favoriser l\'accès à la culture pour tous.'
            ],
            'mission_image' => 'assets/img/mission.png',
        ]);
    }
}
