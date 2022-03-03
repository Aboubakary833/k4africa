<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    
    const PARTNERS = [
        'Authentik & Co' => [
            'partners/ODqb4rBRFrED92Fwm6DsOquKKCvGo7HmFzuQokPn.png',
            'https://authentikco.com/'
        ],
        'Trained Manager' => [
            'partners/wv0HUKTQJEEVWXs2aqa0aeVF6KQO0wwNNleH4m9f.png',
            'https://www.trainedmanager.com/'
        ],
        'Janis Auto Parts' => [
            'partners/2OfuDjz3XlOfVKH8mlj8KjXzNIdGXPPaPF1IOEi9.jpg',
            'https://janisautoparts.com/'
        ],
    ];

    public function run()
    {
        foreach (self::PARTNERS as $key => $value) {
            Partner::create([
                'name' => $key,
                'logo' => $value[0],
                'link' => $value[1],
            ]);
        }
    }
}
