<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsPrice extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'uuid' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
                'unique'     => true,
            ],
            'produto_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
            ],
            'preco' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'preco_promocional' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => true,
            ],
            'data_inicio' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'data_fim' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('produto_id');
        $this->forge->addUniqueKey('uuid');
        $this->forge->createTable('produtos_preco');
    }

    public function down()
    {
        $this->forge->dropTable('produtos_preco');
    }
}
