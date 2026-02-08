<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actualite;
use App\Models\Galerie;
use App\Models\Video;
use App\Models\Communique;
use App\Models\Page;
use Carbon\Carbon;

class MediaContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pages (Infos Pratiques)
        $pages = [
            [
                'slug' => 'lieu',
                'title' => 'Lieu & Accès',
                'content' => '<div class="row gy-4">
                <div class="col-lg-6">
                    <div class="info-item d-flex">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Adresse du Festival</h3>
                            <p>Place de la Mairie, Adjamé, Abidjan, Côte d\'Ivoire</p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-bus-front flex-shrink-0"></i>
                        <div>
                            <h3>Transports en Commun</h3>
                            <p><strong>Bus SOTRA :</strong> Lignes 04, 11, 27, 81 (Arrêt Mairie)<br>
                                <strong>Gbaka :</strong> Gare d\'Adjamé Liberté à 500m
                            </p>
                        </div>
                    </div>
                    <div class="info-item d-flex">
                        <i class="bi bi-car-front flex-shrink-0"></i>
                        <div>
                            <h3>Parking</h3>
                            <p>Un parking sécurisé de 200 places est disponible à proximité du site (payant).</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-4">
                        <iframe style="border:0; width: 100%; height: 400px; border-radius: 8px;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15889.37525381834!2d-4.025686000000001!3d5.3626297!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eaa142475471%3A0x66487e91122a275e!2sMairie%20d&#39;Adjam%C3%A9!5e0!3m2!1sfr!2sci!4v1707335689123!5m2!1sfr!2sci"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>',
            ],
            [
                'slug' => 'securite',
                'title' => 'Sécurité & Règlement',
                'content' => '<div class="row gy-4">
                <div class="col-lg-6">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-shield-check"></i></div>
                        <div>
                            <h4 class="title">Dispositif de Sécurité</h4>
                            <p class="description">Un dispositif de sécurité renforcé est mis en place en collaboration avec la Police Nationale et une société de sécurité privée. Des contrôles seront effectués aux entrées.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-bag-x"></i></div>
                        <div>
                            <h4 class="title">Objets Interdits</h4>
                            <p class="description">Sont interdits sur le site : armes, objets tranchants, bouteilles en verre, substances illicites, feux d\'artifice.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-people"></i></div>
                        <div>
                            <h4 class="title">Enfants Perdus</h4>
                            <p class="description">Un point de rassemblement pour les enfants perdus est situé près du poste de secours. Nous recommandons de munir les enfants d\'un bracelet avec vos coordonnées.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item d-flex">
                        <div class="icon flex-shrink-0"><i class="bi bi-hospital"></i></div>
                        <div>
                            <h4 class="title">Premiers Secours</h4>
                            <p class="description">Une antenne médicale de la Croix-Rouge est présente sur le site pour assurer les premiers soins en cas de besoin.</p>
                        </div>
                    </div>
                </div>
            </div>',
            ],
            [
                'slug' => 'hebergement',
                'title' => 'Hébergement',
                'content' => '<div class="row gy-4">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/hotels/hotel-1.jpg" class="img-fluid" alt="Hôtel Ivoire Adjamé" style="height: 250px; width: 100%; object-fit: cover; background-color: #ddd;">
                            <div class="social">
                                <a href="#"><i class="bi bi-telephone"></i> Réserver</a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Hôtel Le Prestige</h4>
                            <span>À 500m du site</span>
                            <p>Confort moderne, wifi gratuit et petit-déjeuner inclus. Idéal pour les familles.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/hotels/hotel-2.jpg" class="img-fluid" alt="Résidence Les Ambassades" style="height: 250px; width: 100%; object-fit: cover; background-color: #ddd;">
                            <div class="social">
                                <a href="#"><i class="bi bi-telephone"></i> Réserver</a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Résidence Les Ambassades</h4>
                            <span>À 1km du site</span>
                            <p>Appartements meublés tout confort pour un séjour en toute autonomie.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/hotels/hotel-3.jpg" class="img-fluid" alt="Auberge de la Paix" style="height: 250px; width: 100%; object-fit: cover; background-color: #ddd;">
                            <div class="social">
                                <a href="#"><i class="bi bi-telephone"></i> Réserver</a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Auberge de la Paix</h4>
                            <span>À 800m du site</span>
                            <p>Une option économique et conviviale au cœur du quartier.</p>
                        </div>
                    </div>
                </div>
            </div>',
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }

        // Sociales Page specific update for full content structure
        Page::updateOrCreate(
            ['slug' => 'sociales'],
            [
                'title' => 'Œuvres Sociales',
                'image' => 'assets/img/about.jpg',
                'content' => '
    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                    <img src="[IMAGE_BANNIERE]" class="img-fluid" alt="">
                    <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
                </div>
                <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                    <h3>Engagement Communautaire</h3>
                    <p class="fst-italic">
                        Chaque année, le festival reverse une partie de ses bénéfices à des actions caritatives.
                    </p>
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Rénovation d\'écoles primaires dans la commune
                                d\'Adjamé.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Dons de kits scolaires aux familles défavorisées.</span>
                        </li>
                        <li><i class="bi bi-check2-all"></i> <span>Soutien aux orphelinats locaux.</span></li>
                    </ul>
                    <p>
                        Notre mission va au-delà de la culture. Nous croyons en l\'impact positif que nous pouvons avoir sur
                        notre environnement et sur la jeunesse d\'Adjamé. Rejoignez-nous dans cette aventure humaine.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-emoji-smile"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="1500" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Enfants aidés</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-journal-richtext"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Écoles rénovées</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-headset"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Associations partenaires</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="bi bi-people"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                            class="purecounter"></span>
                        <p>Bénévoles engagés</p>
                    </div>
                </div>
            </div>
        </div>
    </section>'
            ]
        );

        // 2. Actualites
        Actualite::create([
            'title' => 'Lancement officiel du FESCAD 2026',
            'slug' => 'lancement-officiel-fescad-2026',
            'content' => 'La conférence de presse de lancement du Festival Culturel d\'Adjamé s\'est tenue ce matin à la Mairie.',
            'image' => null,
            'published_at' => Carbon::now(),
        ]);

        Actualite::create([
            'title' => 'Magic System confirmé en tête d\'affiche',
            'slug' => 'magic-system-confirme',
            'content' => 'Le célèbre groupe ivoirien Magic System fera vibrer la scène du FESCAD le samedi soir.',
            'image' => null,
            'published_at' => Carbon::now()->subDays(2),
        ]);

        // 3. Galeries
        for ($i = 1; $i <= 6; $i++) {
            Galerie::create([
                'title' => 'Ambiance Festival ' . $i,
                'category' => $i % 2 == 0 ? 'Concert' : 'Ambiance',
                'image_path' => 'assets/img/gallery/gallery-' . $i . '.jpg',
            ]);
        }

        // 4. Videos
        Video::create([
            'title' => 'Aftermovie FESCAD 2025',
            'youtube_link' => 'https://www.youtube.com/watch?v=LxO-6rlihSg',
        ]);

        Video::create([
            'title' => 'Interview du Commissaire Général',
            'youtube_link' => 'https://www.youtube.com/watch?v=LxO-6rlihSg',
        ]);

        // 5. Communiques
        Communique::create([
            'title' => 'Communiqué de presse N°1 - Lancement',
            'file_path' => 'assets/docs/communique-1.pdf',
            'published_at' => Carbon::now(),
        ]);
    }
}
