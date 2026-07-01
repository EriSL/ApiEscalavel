<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersItems extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'pedido_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'produto_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'codigo_produto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descricao' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantidade' => [
                'type' => 'DECIMAL',
                'constraint' => '15,4',
            ],
            'valor_unitario' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'valor_desconto' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0.00,
            ],
            'valor_total' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
