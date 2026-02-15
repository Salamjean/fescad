<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class SocialesPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = '<h3>Engagement Communautaire</h3>
<p class="fst-italic">
    Chaque année, le festival reverse une partie de ses bénéfices à des actions caritatives.
</p>
<ul>
    <li><i class="bi bi-check2-all"></i> <span>Rénovation d\'écoles primaires dans la commune d\'Adjamé.</span></li>
    <li><i class="bi bi-check2-all"></i> <span>Dons de kits scolaires aux familles défavorisées.</span></li>
    <li><i class="bi bi-check2-all"></i> <span>Soutien aux orphelinats locaux.</span></li>
</ul>
<p>
    Notre mission va au-delà de la culture. Nous croyons en l\'impact positif que nous pouvons avoir sur notre environnement et sur la jeunesse d\'Adjamé. Rejoignez-nous dans cette aventure humaine.
</p>';

        Page::updateOrCreate(
            ['slug' => 'sociales'],
            [
                'title' => 'Œuvres Sociales',
                'category' => 'oeuvres-sociales',
                'content' => $content,
                'is_active' => true,
                // 'image' => 'assets/img/about.jpg', // Assuming image handling in controller/view uses this path or modification needed
            ]
        );
    }
}
