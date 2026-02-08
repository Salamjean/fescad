<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tarif;
use App\Models\Condition;

class TarifConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tarifs
        $tarifs = [
            [
                'name' => 'Pass Journalier',
                'price' => '5 000',
                'icon' => 'bi bi-box',
                'features' => json_encode([
                    'Accès au festival pour 1 jour',
                    'Accès aux concerts du jour',
                    'Accès aux stands d\'exposition'
                ]),
                'recommended' => false,
            ],
            [
                'name' => 'Pass 3 Jours',
                'price' => '12 000',
                'icon' => 'bi bi-rocket',
                'features' => json_encode([
                    'Accès illimité pour les 3 jours',
                    'Accès à tous les concerts',
                    'Accès prioritaire aux ateliers',
                    '1 T-shirt officiel offert'
                ]),
                'recommended' => true,
            ],
            [
                'name' => 'Pass VIP',
                'price' => '25 000',
                'icon' => 'bi bi-gem',
                'features' => json_encode([
                    'Accès illimité 3 jours',
                    'Place réservée aux concerts',
                    'Accès Espace VIP & Cocktail',
                    'Rencontre avec les artistes',
                    'Kit complet goodies FESCAD'
                ]),
                'recommended' => false,
            ],
        ];

        foreach ($tarifs as $tarif) {
            Tarif::create($tarif);
        }

        // 2. Conditions
        $conditions = [
            [
                'title' => '1. Objet',
                'content' => 'Les présentes conditions générales ont pour objet de définir les droits et obligations des participants, exposants et visiteurs du Festival Culturel d\'Adjamé (FESCAD).',
                'order' => 1,
            ],
            [
                'title' => '2. Accès au Festival',
                'content' => 'L\'accès au site du festival est soumis à la présentation d\'un billet ou d\'un badge valide. L\'organisation se réserve le droit de refuser l\'accès à toute personne ne respectant pas les règles de sécurité.',
                'order' => 2,
            ],
            [
                'title' => '3. Billetterie',
                'content' => 'Les billets achetés ne sont ni échangeables ni remboursables, sauf en cas d\'annulation totale de l\'événement par l\'organisateur.',
                'order' => 3,
            ],
            [
                'title' => '4. Sécurité',
                'content' => 'Il est strictement interdit d\'introduire des objets dangereux, des armes, ou des substances illicites sur le site du festival. Des fouilles peuvent être effectuées à l\'entrée.',
                'order' => 4,
            ],
            [
                'title' => '5. Image et Droit à l\'image',
                'content' => 'En participant au FESCAD, vous autorisez l\'organisateur à utiliser votre image (photos, vidéos) prise lors de l\'événement pour des besoins de communication et de promotion.',
                'order' => 5,
            ],
            [
                'title' => '6. Responsabilité',
                'content' => 'L\'organisateur décline toute responsabilité en cas de perte, vol ou détérioration d\'objets personnels sur le site du festival.',
                'order' => 6,
            ],
        ];

        foreach ($conditions as $condition) {
            Condition::create($condition);
        }
    }
}
