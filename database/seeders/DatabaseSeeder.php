<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rohmad',
            'email' => 'rohmad@cokrogroup.com',
            'password' => Hash::make('rohmad123'),
        ]);

        // data dummy for company
        \App\Models\Company::create([
            'name' => 'CV. Cokro Bersatu',
            'email' => 'cokroit@gmail.com',
            'address' => 'Jl. Hayam Wuruk, Madiun, Jawa Timur',
            'latitude' => '-7.747033',
            'longitude' => '110.355398',
            'radius_km' => '0.5',
            'time_in' => '08:00',
            'time_out' => '17:00',
        ]);

        // call sedder attadance
        $this->call([
            AttendanceSeeder::class,
        ]);
    }
}
