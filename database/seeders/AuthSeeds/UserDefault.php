<?php

namespace Database\Seeders\AuthSeeds;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDefault extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('test123')
        ]);
    }
}
