<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\ParentMachine;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Royhan Daffa',
            'email' => 'royhandf@gmail.com',
            'password' => bcrypt('password'),
            'roles' => 'ADMIN',
        ]);

        Department::factory(10)->create();
        // ParentMachine::factory(30)->create();
    }
}
