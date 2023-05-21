<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Gamis',],
            ['name' => 'Blouse',],
            ['name' => 'Hijab',],
        ];

        foreach ($data as $key => $item) {
            ProductCategory::create($item);
        }
    }
}
