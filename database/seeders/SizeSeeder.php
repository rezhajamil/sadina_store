<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
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
                'name' => 'XS',
                'category' => 'Atasan',
            ],
            [
                'name' => 'S',
                'category' => 'Atasan',
            ],
            [
                'name' => 'M',
                'category' => 'Atasan',
            ],
            [
                'name' => 'L',
                'category' => 'Atasan',
            ],
            [
                'name' => 'XL',
                'category' => 'Atasan',
            ],
            [
                'name' => 'XXL',
                'category' => 'Atasan',
            ],
        ];

        foreach ($data as $key => $item) {
            Size::create($item);
        }
    }
}
