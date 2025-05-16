<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        for ($i = 0; $i < 100; $i++) {
            User::create([
                'name' => 'Halan ke-'.$i,
                'email' => 'halan'.$i.'@gmail.com',
                'password' => '12345678'.$i
            ]);
        }
    }
}
