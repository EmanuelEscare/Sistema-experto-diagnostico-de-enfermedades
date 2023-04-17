<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $doctor = Role::create(['name' => 'doctor']);
        $recepcionista = Role::create(['name' => 'recepcionista']);

        // ADMIN USER
        $admin = User::create([
            'name' => 'Emanuel',
            'email' => 'emaescov@gmail.com',
            'password' => bcrypt('asd123'),
        ]);

        // ADMIN USER
        $doctor = User::create([
            'name' => 'Dr. Ema',
            'email' => 'emaescov@doc.com',
            'password' => bcrypt('asd123'),
        ]);

        // ADMIN USER
        $recepcionista = User::create([
            'name' => 'Ema',
            'email' => 'emaescov@rep.com',
            'password' => bcrypt('asd123'),
        ]);


        $admin->assignRole('admin');
        $doctor->assignRole('doctor');
        $recepcionista->assignRole('recepcionista');

    }
}
