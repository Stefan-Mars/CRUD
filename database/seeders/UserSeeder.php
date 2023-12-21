<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $user = [
            "name" => "Stefan",
            "email" => "stefanrmars@gmail.com",
            "password" => "$2y$12$"."aFkSpprR992KFmh9mSQQx.8/GPXX9CkiKui9PQorUGxZtoa9wao2y",
        ];
        
        $user = User::create($user);
        
        // Assign the role to the created user
        $user->assignRole('Admin');
        
        
    }
}
