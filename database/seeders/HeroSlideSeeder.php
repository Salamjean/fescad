<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Bienvenue au FESCAD',
                'description' => 'Vivez l\'expérience unique du Festival Culturel d\'Adjamé ! Un événement vibrant qui célèbre la richesse artistique et l\'énergie de notre quartier.',
                'image' => 'assets/img/hero-bg.jpg',
                'btn1_text' => 'Voir le Programme',
                'btn1_link' => '#programme',
                'order' => 1,
            ],
            [
                'title' => 'Exposez votre talent',
                'description' => 'Vous êtes artiste, artisan ou intervenant ? Rejoignez la grande famille du FESCAD ! Inscrivez-vous pour participer au festival.',
                'image' => 'assets/img/artistique.jpeg',
                'btn1_text' => 'Devenir Exposant',
                'btn1_link' => route('inscription.artiste'),
                'order' => 2,
            ],
            [
                'title' => 'Réservez votre stand',
                'description' => 'Ne manquez pas l\'opportunité d\'être au cœur de l\'événement. Achetez dès maintenant votre stand pour le festival.',
                'image' => 'assets/img/about.jpg',
                'btn1_text' => 'Acheter un Stand',
                'btn1_link' => route('billetterie.stand'),
                'order' => 3,
            ],
            [
                'title' => 'Participez à l\'aventure',
                'description' => 'Le FESCAD, c\'est aussi une œuvre collective. Devenez bénévole et contribuez au succès de cette fête culturelle.',
                'image' => 'assets/img/communaute.jpeg',
                'btn1_text' => 'Devenir Partenaire',
                'btn1_link' => 'partenaires.html',
                'btn2_text' => 'Devenir Bénévole',
                'btn2_link' => route('inscription.benevole'),
                'order' => 4,
            ],
        ];

        foreach ($slides as $slide) {
            \App\Models\HeroSlide::create($slide);
        }
    }
}
