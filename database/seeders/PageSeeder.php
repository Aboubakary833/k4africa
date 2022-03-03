<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{

    const DEFAULT_PAGES = [
        [
            'Accueil',
            "KNOWLEDGE <span> FOR AFRICA</span> au  cœur de la transformation digitale."
        ],
        ['Services',"Tous Les Services"],
        ['Programmes',"Tous nos programmes"],
        ['À propos', 'À propos'],
        ['Contacts', 'Nous contacter']
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < count(self::DEFAULT_PAGES); $i++) { 
            Page::create([
                'name' => self::DEFAULT_PAGES[$i][0],
                'slug_id' => $i + 1,
                'title' => self::DEFAULT_PAGES[$i][1],
            ]);
        }
    }
}
