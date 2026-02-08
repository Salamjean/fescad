<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FestivalPresentation;
use App\Models\CommissaireMessage;

class FestivalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Présentation
        FestivalPresentation::create([
            'title' => 'Le FESCAD : Au cœur de la culture d\'Adjamé',
            'subtitle' => 'Une célébration vibrante de l\'art, de la culture et de la communauté.',
            'description' => 'Le Festival Culturel d\'Adjamé (FESCAD) est bien plus qu\'un simple événement : c\'est un rendez-vous incontournable qui met en lumière la richesse et la diversité culturelle de notre commune.

Une vitrine pour les artistes locaux et nationaux.
Un espace d\'échanges et de rencontres intergénérationnelles.
Des activités variées : concerts, expositions, théâtre, danse et gastronomie.

Depuis sa création, le FESCAD s\'engage à promouvoir les talents d\'Adjamé et à offrir aux festivaliers une expérience unique, mêlant tradition et modernité. Rejoignez-nous pour célébrer ensemble notre patrimoine et notre créativité.',
            'image' => 'assets/img/about.jpg',
            'video_link' => 'https://www.youtube.com/watch?v=Y7f98aduVJ8',
        ]);

        // 2. Commissaire Message
        CommissaireMessage::create([
            'name' => '[Nom du Commissaire]',
            'role' => 'Commissaire Général du FESCAD',
            'title' => 'Bienvenue au FESCAD',
            'message' => '"C\'est avec une immense fierté que je vous accueille au Festival Culturel d\'Adjamé. Ce festival est le fruit d\'une ambition commune : celle de célébrer notre identité, notre créativité et notre vivre-ensemble."

Adjamé est un carrefour, un lieu de brassage unique où les cultures se rencontrent et s\'enrichissent mutuellement. À travers le FESCAD, nous voulons offrir une scène à nos talents, mais aussi créer des ponts entre les générations et les communautés.

Je vous invite à plonger au cœur de cette effervescence, à découvrir, à partager et à vibrer au rythme de notre festival. Ensemble, faisons rayonner la culture d\'Adjamé par-delà nos frontières.',
            'image' => 'assets/img/team/commissaire.jpg',
            'signature_image' => 'assets/img/signature.png',
        ]);
    }
}
