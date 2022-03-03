<?php

namespace Database\Seeders;

use App\Models\Slug;
use Illuminate\Database\Seeder;

class SlugSeeder extends Seeder
{

    const DEFAULT_SLUGS = [
        'home' => '/',
        'services' => 'services',
        'programs' => 'programmes',
        'about' => 'a_propos',
        'contact' => 'contacts',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::DEFAULT_SLUGS as $name => $value) {
            Slug::create([
                'name' => $name,
                'value' => $value,
            ]);
        }
    }
}
