<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(roles::class);
        $this->call(padecimientos::class);
        $this->call(sintomas::class);
        $this->call(pacientes::class);
        $this->call(usersrand::class);
    }
}
