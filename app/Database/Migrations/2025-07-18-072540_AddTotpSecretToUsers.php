<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTotpSecretToUsers extends Migration
{
    public function up()
    {
        $fields = [
            'totp_secret' => [
                'type'       => 'VARCHAR',
                'constraint' => 64,
                'null'       => true,
            ],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'totp_secret');
    }
}
