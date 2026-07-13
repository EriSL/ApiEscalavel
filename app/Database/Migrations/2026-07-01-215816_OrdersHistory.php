<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrdersHistory extends Migration
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
            'acao' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'descricao' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'usuario' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('uuid');
        $this->forge->createTable('pedidos_historico');
    }

    public function down()
    {
        $this->forge->dropTable('pedidos_historico');
    }
}
