<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Admin::insert([
            'name' => 'tobbyluvsky',
            'email' => 'admin@admin.com',
            'password' => bcrypt('oluwadamilola1'),
            'phone' => '09059153987',
            'address' => 'lagos state ojo',
            'role_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
