<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Featured Services
        $services = [
            [
                'title' => 'Programme Complet',
                'description' => 'Consultez le planning détaillé du festival par jour et par scène. Ne manquez aucune performance de vos artistes préférés.',
                'icon' => 'bi-calendar-event',
                'link' => route('programme'),
                'color_class' => 'item-cyan',
                'order' => 1,
            ],
            [
                'title' => 'Billetterie & Stands',
                'description' => 'Réservez vos places et achetez votre stand d\'exposition en ligne de manière sécurisée et simplifiée.',
                'icon' => 'bi-ticket-perforated',
                'link' => route('billetterie.stand'),
                'color_class' => 'item-orange',
                'order' => 2,
            ],
            [
                'title' => 'Infos Pratiques',
                'description' => 'Toutes les informations utiles : accès, plan interactif, hébergement, sécurité et FAQ pour préparer votre visite.',
                'icon' => 'bi-info-circle',
                'link' => route('infos.lieu'),
                'color_class' => 'item-teal',
                'order' => 3,
            ],
            [
                'title' => 'Galerie & Actualités',
                'description' => 'Découvrez les photos, vidéos des éditions précédentes et restez informé des dernières actualités du festival.',
                'icon' => 'bi-images',
                'link' => route('media.galerie'),
                'color_class' => 'item-red',
                'order' => 4,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\HomeService::create($service);
        }

        // 2. About Section (FestivalPresentation update)
        $about = \App\Models\FestivalPresentation::first();
        if ($about) {
            $about->update([
                'title' => 'Le FESCAD : La Vitrine Culturelle d\'Adjamé',
                'subtitle' => 'Bien plus qu\'un festival, le FESCAD est un rendez-vous annuel qui célèbre la richesse culturelle, l\'énergie créative et le vivre-ensemble dans le dynamique quartier d\'Adjamé.',
                'description' => 'Sous l\'impulsion de notre Commissaire Général et avec le soutien de nos partenaires, le FESCAD s\'engage à offrir une expérience culturelle immersive et accessible à tous. Chaque édition est l\'occasion de découvrir de nouveaux talents, de partager des moments uniques et de contribuer au développement culturel de notre communauté.',
                'points' => [
                    'Promouvoir les talents locaux et internationaux à travers des performances artistiques diversifiées',
                    'Favoriser les échanges culturels et renforcer la cohésion sociale',
                    'Valoriser le patrimoine culturel d\'Adjamé tout en ouvrant des perspectives innovantes',
                    'Créer des opportunités économiques pour les artisans, artistes et commerçants locaux'
                ],
                'btn1_text' => 'Découvrir notre histoire',
                'btn1_link' => route('festival.presentation'),
                'btn2_text' => 'Message du Commissaire',
                'btn2_link' => route('festival.commissaire'),
            ]);
        }

        // 3. Why Participate? (HomeFeature)
        $features = [
            [
                'title' => 'Une Expérience Culturelle Immersive',
                'subtitle' => 'Plongez au cœur d\'une programmation riche et variée qui célèbre la diversité culturelle d\'Adjamé et au-delà.',
                'description' => null,
                'image' => 'assets/img/artistique.jpeg',
                'points' => [
                    'Multiplicité des arts : musique, danse, théâtre, arts visuels, artisanat',
                    'Scènes dédiées : espaces spécifiques pour chaque discipline artistique',
                    'Rencontres avec les artistes : sessions d\'échange et ateliers participatifs'
                ],
                'order' => 1,
                'is_reversed' => false,
            ],
            [
                'title' => 'Une Plateforme Numérique Complète',
                'subtitle' => 'Notre site internet a été conçu pour faciliter votre expérience du festival, avant, pendant et après l\'événement.',
                'description' => 'Grâce à notre plateforme intuitive, accédez à toutes les informations et services essentiels : consultation du programme en temps réel, achat sécurisé de billets et de stands, réservation d\'activités, plan interactif du site, et mise à jour instantanée des actualités. Une expérience utilisateur fluide sur tous vos appareils.',
                'image' => 'assets/img/plateforme.png',
                'points' => null,
                'order' => 2,
                'is_reversed' => true,
            ],
            [
                'title' => 'Un Engagement Communautaire Fort',
                'subtitle' => null,
                'description' => 'Le FESCAD est bien plus qu\'un festival : c\'est un projet collectif qui implique et valorise l\'ensemble de la communauté d\'Adjamé.',
                'image' => 'assets/img/communaute.jpeg',
                'points' => [
                    'Œuvres sociales : une partie des bénéfices est réinvestie dans des projets locaux',
                    'Opportunités économiques : débouchés pour artisans, restaurateurs et commerçants',
                    'Programme bénévole : impliquez-vous dans l\'organisation de l\'événement'
                ],
                'order' => 3,
                'is_reversed' => false,
            ],
            [
                'title' => 'Un Réseau de Partenaires Engagés',
                'subtitle' => 'Le FESCAD bénéficie du soutien d\'un réseau dynamique de partenaires institutionnels et privés.',
                'description' => 'En rejoignant notre communauté de partenaires, vous contribuez au développement culturel de la région tout en bénéficiant d\'une visibilité exceptionnelle. Nous proposons différents niveaux de partenariat adaptés à vos objectifs, avec des avantages sur mesure pour les sponsors, médias et institutions.',
                'image' => 'assets/img/partenaire.jpeg',
                'btn_text' => 'Devenir Partenaire',
                'btn_link' => 'partenaires.html',
                'order' => 4,
                'is_reversed' => true,
            ],
        ];

        foreach ($features as $feature) {
            \App\Models\HomeFeature::create($feature);
        }
    }
}
