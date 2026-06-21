<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'pesanan_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'menu_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'nama_menu' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'jumlah' => [
                'type' => 'INT',
                'default' => 1
            ],
            'harga' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2'
            ],
            'created_at DATETIME NULL',
            'updated_at DATETIME NULL',
            'deleted_at DATETIME NULL'
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'pesanan_id',
            'pesanan',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->addForeignKey(
            'menu_id',
            'menu',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('detail_pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('detail_pesanan');
    }
}