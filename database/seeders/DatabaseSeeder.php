<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'omar',
            'email' => 'omar@example.com',
            'password' => 'password', 
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'ibrahem',
            'email' => 'ibrahem@example.com',
            'password' => 'password',
            'role' => 'sales',
        ]);

        $project1 = Project::create([
            'name' => 'Mountain View',
            'location' => 'New Cairo',
        ]);

        $project2 = Project::create([
            'name' => 'Palm Hills',
            'location' => '6th of October',
        ]);

        Unit::create([
            'project_id' => $project1->id,
            'unit_number' => 'MV-A1',
            'price' => 2500000,
            'status' => 'available',
        ]);

        Unit::create([
            'project_id' => $project1->id,
            'unit_number' => 'MV-B2',
            'price' => 3000000,
            'status' => 'sold', 
        ]);

        Unit::create([
            'project_id' => $project2->id,
            'unit_number' => 'PH-101',
            'price' => 1800000,
            'status' => 'available',
        ]);
    }
}
