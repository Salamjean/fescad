<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programme;
use App\Models\Artiste;
use Carbon\Carbon;

class ProgrammeArtisteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Programme
        // Assuming current year or specific dates. Let's use a fixed date for now or dynamic next month.
        // Based on "Ven. 15", "Sam. 16", "Dim. 17", let's use Nov 2024 as in the template
        $year = 2024; // Or current year

        $events = [
            // Jour 1: Ven 15
            [
                'date' => "$year-11-15",
                'start_time' => '09:30',
                'title' => 'Cérémonie d\'ouverture',
                'description' => 'Lancement officiel du festival en présence des autorités et des partenaires. Discours, coupure du ruban et visite des stands.',
                'location' => 'Scène Principale',
            ],
            [
                'date' => "$year-11-15",
                'start_time' => '11:00',
                'title' => 'Vernissage Exposition Photos',
                'description' => 'Découverte de l\'exposition "Adjamé d\'hier à aujourd\'hui". Un voyage visuel à travers l\'histoire de la commune.',
                'location' => 'Galerie d\'Art',
            ],
            [
                'date' => "$year-11-15",
                'start_time' => '14:00',
                'title' => 'Spectacle de Danse Traditionnelle',
                'description' => 'Prestation des troupes locales mettant en valeur les richesses culturelles de nos régions.',
                'location' => 'Scène Culturelle',
            ],

            // Jour 2: Sam 16
            [
                'date' => "$year-11-16",
                'start_time' => '10:00',
                'title' => 'Ateliers Créatifs',
                'description' => 'Ateliers de peinture, poterie et vannerie ouverts à tous (enfants et adultes). Inscription sur place.',
                'location' => 'Zone Ateliers',
            ],
            [
                'date' => "$year-11-16",
                'start_time' => '16:00',
                'title' => 'Théâtre de Rue',
                'description' => 'Représentations théâtrales déambulatoires dans les rues d\'Adjamé pour surprendre et amuser les passants.',
                'location' => 'Rues d\'Adjamé',
            ],
            [
                'date' => "$year-11-16",
                'start_time' => '20:00',
                'title' => 'Grand Concert Populaire',
                'description' => 'Soirée festive avec la participation d\'artistes de renom de la scène musicale ivoirienne.',
                'location' => 'Grande Scène',
            ],

            // Jour 3: Dim 17
            [
                'date' => "$year-11-17",
                'start_time' => '11:00',
                'title' => 'Foire Gastronomique',
                'description' => 'Dégustation des spécialités culinaires locales. Un véritable voyage gustatif à ne pas manquer.',
                'location' => 'Village Gastronomique',
            ],
            [
                'date' => "$year-11-17",
                'start_time' => '17:00',
                'title' => 'Cérémonie de Clôture',
                'description' => 'Remise des prix, remerciements aux partenaires et concert final pour clore le festival en beauté.',
                'location' => 'Scène Principale',
            ],
        ];

        foreach ($events as $event) {
            Programme::create($event);
        }

        // 2. Artistes
        $artistes = [
            [
                'name' => 'Walter White',
                'role' => 'Chanteur Principal',
                'image' => 'assets/img/team/team-1.jpg',
                'facebook' => '#',
                'instagram' => '#',
            ],
            [
                'name' => 'Sarah Jhonson',
                'role' => 'Danseuse Étoile',
                'image' => 'assets/img/team/team-2.jpg',
                'instagram' => '#',
                'twitter' => '#',
            ],
            [
                'name' => 'William Anderson',
                'role' => 'Groupe de Théâtre',
                'image' => 'assets/img/team/team-3.jpg',
                'facebook' => '#',
            ],
            [
                'name' => 'Amanda Jepson',
                'role' => 'Artiste Peintre',
                'image' => 'assets/img/team/team-4.jpg',
                'instagram' => '#',
            ],
        ];

        foreach ($artistes as $artiste) {
            Artiste::create($artiste);
        }
    }
}
