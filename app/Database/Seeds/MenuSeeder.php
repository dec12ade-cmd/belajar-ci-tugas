<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_menu' => 'Indomie Goreng',
                'kategori' => 'Makanan',
                'harga' => 12000,
                'foto' => 'indomie-goreng.jpg'
            ],
            [
                'nama_menu' => 'Indomie Kuah',
                'kategori' => 'Makanan',
                'harga' => 12000,
                'foto' => 'indomie-kuah.jpg'
            ],
            [
                'nama_menu' => 'Nasi Telur',
                'kategori' => 'Makanan',
                'harga' => 10000,
                'foto' => 'nasi-telur.jpg'
            ],
            [
                'nama_menu' => 'Nasi Ayam',
                'kategori' => 'Makanan',
                'harga' => 15000,
                'foto' => 'nasi-ayam.jpg'
            ],
            [
                'nama_menu' => 'Es Teh',
                'kategori' => 'Minuman',
                'harga' => 5000,
                'foto' => 'es-teh.jpg'
            ],
            [
                'nama_menu' => 'Teh Hangat',
                'kategori' => 'Minuman',
                'harga' => 4000,
                'foto' => 'teh-hangat.jpg'
            ],
            [
                'nama_menu' => 'Kopi Hitam',
                'kategori' => 'Minuman',
                'harga' => 7000,
                'foto' => 'kopi-hitam.jpg'
            ]
        ];

        foreach ($data as $menu) {
            $menu['created_at'] = date('Y-m-d H:i:s');
            $menu['updated_at'] = date('Y-m-d H:i:s');

            $this->db->table('menu')->insert($menu);
        }
    }
}