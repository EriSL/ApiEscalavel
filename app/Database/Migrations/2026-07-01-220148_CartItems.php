<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CartItems extends Migration
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
            'cart_id' => [
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
                'default' => 1,
            ],
            'preco_unitario' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0.00,
            ],
            'preco_original' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'null' => true,
            ],
            'desconto' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0.00,
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '15,2',
                'default' => 0.00,
            ],
            'attributes' => [
                'type' => 'TEXT',
                'null' => true,
                // variações: tamanho, cor, etc (JSON)
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
        $this->forge->addKey('cart_id');
        $this->forge->addKey('produto_id');
        $this->forge->addUniqueKey('uuid');
        $this->forge->createTable('carrinho_itens');
    }

    public function down()
    {
        $this->forge->dropTable('carrinho_itens');
    }
}
