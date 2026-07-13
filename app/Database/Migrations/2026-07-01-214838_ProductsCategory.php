<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductsCategory extends Migration
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
            'descricao' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'categoria_pai_id' => [
                'type'       => 'BIGINT',
                'constraint' => 20,
                'unsigned'   => true,
                'null'       => true,
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
        $this->forge->addKey('uuid', true);
        $this->forge->createTable('produtos_categoria');
    }

    public function down()
    {
        $this->forge->dropTable('produtos_categoria');
    }
}
