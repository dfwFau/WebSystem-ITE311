<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForceLogoutToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'force_logout_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
                'comment' => 'Timestamp to force logout when password is changed'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'force_logout_at');
    }
}
