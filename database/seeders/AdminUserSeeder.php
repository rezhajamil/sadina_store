<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin',
            'email' => 'admin@sadina.store',
            'phone' => '85357260666',
            'whatsapp' => '85357260666',
            'role' => 'admin',
        ];

        User::create($data);
    }
}
