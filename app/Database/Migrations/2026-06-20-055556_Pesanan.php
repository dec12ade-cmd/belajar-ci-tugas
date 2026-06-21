<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true
            ],
            'tanggal_pesanan' => [
                'type' => 'DATETIME'
            ],
            'total_bayar' => [
                'type' => 'DECIMAL',
                'constraint' => '12,2',
                'default' => 0
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'selesai'],
                'default' => 'pending'
            ],
            'created_at DATETIME NULL',
            'updated_at DATETIME NULL',
            'deleted_at DATETIME NULL'
        ]);

        $this->forge->addKey('id', true);

        $this->forge->addForeignKey(
            'user_id',
            'user',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pesanan');
    }
}