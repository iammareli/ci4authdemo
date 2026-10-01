<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use RuntimeException;

class DemoUserSeeder extends Seeder
{
    public function run()
    {
        $password = (string) env('CLASSROOM_DEMO_PASSWORD', '');

        if (strlen($password) < 12) {
            throw new RuntimeException(
                'Set CLASSROOM_DEMO_PASSWORD to at least 12 characters.'
            );
        }

        $users = $this->db->table('users');

        // Avoid inserting another admin if the seeder runs twice.
        if ($users->where('username', 'admin')->countAllResults() > 0) {
            return;
        }

        $users->insert([
            'username' => 'admin',
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);
    }
}