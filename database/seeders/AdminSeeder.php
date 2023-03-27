<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WhithoutModelEvents;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::created([
            'name' => 'administrator',
            'email' => 'administrator@locllhost.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        Admin::created([
            'name' => 'editor',
            'email' => 'editor@locllhost.com',
            'role' => 'editor',
            'password' => bcrypt('password'),
        ]);

        Admin::created([
            'name' => 'operator',
            'email' => 'operator@locllhost.com',
            'role' => 'operator',
            'password' => bcrypt('password'),
        ]);
    }
}
