<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'email' => 'ex@ex.io',
            'name' => 'expla',
            'password' => '$2y$10$ifwUNKzTKc3MxsozW0671O85Bb4dOTqmTM4ptbAIUpEbxQiqupUje'    // c12345678
        ]);

        User::factory()->count(10)->create();
    }
}
