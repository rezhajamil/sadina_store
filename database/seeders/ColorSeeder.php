<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'White',
                'hex' => '#FFFFFF',
            ],
            [
                'name' => 'Black',
                'hex' => '#000000',
            ],
        ];

        foreach ($data as $key => $item) {
            Color::create($item);
        }
    }
}
