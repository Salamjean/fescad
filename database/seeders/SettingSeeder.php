<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Setting::create([
            'key' => 'contact_email',
            'value' => 'contact@fescad.ci',
            'label' => 'Email de Contact',
            'type' => 'email',
        ]);

        \App\Models\Setting::create([
            'key' => 'contact_phone',
            'value' => '+225 27 20 20 30 30',
            'label' => 'Téléphone',
            'type' => 'tel',
        ]);

        \App\Models\Setting::create([
            'key' => 'contact_address',
            'value' => "Mairie d'Adjamé, Abidjan, Côte d'Ivoire",
            'label' => 'Adresse',
            'type' => 'text',
        ]);

        \App\Models\Setting::create([
            'key' => 'facebook_link',
            'value' => 'https://facebook.com/fescad',
            'label' => 'Lien Facebook',
            'type' => 'url',
        ]);

        \App\Models\Setting::create([
            'key' => 'instagram_link',
            'value' => 'https://instagram.com/fescad',
            'label' => 'Lien Instagram',
            'type' => 'url',
        ]);

        \App\Models\Setting::create([
            'key' => 'twitter_link',
            'value' => 'https://twitter.com/fescad',
            'label' => 'Lien Twitter/X',
            'type' => 'url',
        ]);

        \App\Models\Setting::create([
            'key' => 'youtube_link',
            'value' => 'https://youtube.com/fescad',
            'label' => 'Lien YouTube',
            'type' => 'url',
        ]);

        \App\Models\Setting::create([
            'key' => 'tiktok_link',
            'value' => 'https://tiktok.com/@fescad',
            'label' => 'Lien TikTok',
            'type' => 'url',
        ]);
    }
}
