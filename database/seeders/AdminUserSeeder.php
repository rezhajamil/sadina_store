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
            'phone' => '811727200',
            'whatsapp' => '811727200',
            'password' => bcrypt('Sadina#81'),
            'role' => 'admin',
        ];

        User::create($data);
    }
}
