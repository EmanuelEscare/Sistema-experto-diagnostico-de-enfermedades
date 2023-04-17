<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class usersrand extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 1000; $i++) { 
            $admin = User::create([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@example.com',
                'password' => bcrypt(Str::random(12)),
            ]);

            $admin->assignRole('doctor');
        }
    }
}
