<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('111'),
            'type' => 'victim',
            'phone' => '1234567890',
            'dob'  => now(),
            'address' => 'dhaka',
            'nid' => '111111',
        ]);
    }
}
