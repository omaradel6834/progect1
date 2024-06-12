<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Nationalitie;
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
      
       // $this->call(UserSeeder::class);
       // $this->call(GradeSeeder::class);
      // $this->call(ClassroomSeeder::class);
       // $this->call(SectionsSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(NationalitieSeeder::class);
        $this->call(religionSeeder::class);
        $this->call(SpecializationsSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
