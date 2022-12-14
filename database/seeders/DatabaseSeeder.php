<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(MitraSeeder::class);
        $this->call(JobVacancySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
