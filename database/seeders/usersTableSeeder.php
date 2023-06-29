<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Johan Hernadez',
            'email' => 'johan@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('j1234'), // password
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Alejandro Franco',
            'email' => 'alejandro@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('al1234'), // password
            'rol' => 'admin',
        ]);

        User::create([
            'name' => 'Andres Gutierrez',
            'email' => 'andres@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('aj1234'), // password
            'rol' => 'admin',
        ]);
    }
}
