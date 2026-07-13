<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersPayments extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'uuid' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'unique' => true,
            ],
            'pedido_id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
            ],
            'forma_pagamento' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'pendente',
            ],
            'valor' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
            ],
            'parcelas' => [
                'type' => 'INT',
                'default' => 1,
            ],
            'transaction_id' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'gateway' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('pedido_id');
        $this->forge->addUniqueKey('uuid');
        $this->forge->createTable('pedidos_pagamentos');
        
    }


    public function down()
    {
        $this->forge->dropTable('pedidos_pagamentos');
    }
}