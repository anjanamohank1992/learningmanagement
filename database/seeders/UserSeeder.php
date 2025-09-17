<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin user
//        User::create([
//            'name' => 'Admin User',
//            'email' => 'admin@example.com',
//            'password' => Hash::make('password'),
//            'role' => 'admin',
//        ]);

        // Student user
        User::create([
            'name' => 'Student User3',
            'email' => 'student3@example.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
//        User::create([
//            'name' => 'Student User2',
//            'email' => 'student2@example.com',
//             'password' => Hash::make('password'), // change later
//            'role' => 'student',
//        ]);
    }
}
