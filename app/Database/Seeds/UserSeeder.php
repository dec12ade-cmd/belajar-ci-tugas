<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        // Admin
        $this->db->table('user')->insert([
            'nama' => 'Administrator',
            'username' => 'admin',
            'password' => password_hash('1234567', PASSWORD_DEFAULT),
            'role' => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Pelanggan
        for ($i = 0; $i < 10; $i++) {
            $this->db->table('user')->insert([
                'nama' => $faker->name,
                'username' => $faker->unique()->userName,
                'password' => password_hash('1234567', PASSWORD_DEFAULT),
                'role' => 'pelanggan',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}