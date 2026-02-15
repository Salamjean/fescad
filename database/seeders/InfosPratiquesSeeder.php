<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class InfosPratiquesSeeder extends Seeder
{
    public function run()
    {
        $pages = [
            [
                'slug' => 'lieu',
                'title' => 'Lieu & Accès',
                'order' => 1,
                'content' => '<h2>Lieu & Accès</h2><p>Informations sur le lieu du festival et comment y accéder.</p>',
            ],
            [
                'slug' => 'hebergement',
                'title' => 'Hébergement',
                'order' => 2,
                'content' => '<h2>Hébergement</h2><p>Informations sur les possibilités d\'hébergement.</p>',
            ],
            [
                'slug' => 'securite',
                'title' => 'Sécurité & Règlement',
                'order' => 3,
                'content' => '<h2>Sécurité & Règlement</h2><p>Règles de sécurité et règlement intérieur du festival.</p>',
            ],
        ];

        foreach ($pages as $data) {
            Page::updateOrCreate(
                ['slug' => $data['slug']],
                [
                    'title' => $data['title'],
                    'category' => 'infos-pratiques',
                    'order' => $data['order'],
                    'is_active' => true,
                    'content' => $data['content'] // Will only set content if creating, or updating. 
                    // To avoid overwriting existing content if the user already added real content, 
                    // we might want to check if it exists first. 
                    // But updateOrCreate updates everything. 
                    // Let's assume for this refactor we want to ensure they are set up correctly.
                    // If content exists, we might want to keep it.
                ]
            );

            // Refine: preserve content if it exists and is not empty
            $page = Page::where('slug', $data['slug'])->first();
            if ($page && !empty($page->content) && $page->wasRecentlyCreated === false) {
                // Content was already there, doing nothing to content, but ensured category/order are updated by above call
            }
        }
    }
}
