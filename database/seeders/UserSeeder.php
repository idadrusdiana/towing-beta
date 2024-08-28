<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'name'      => 'manajer',
            'username'  => 'manajer',
            'email'     => 'manajer03@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938115',
            'store_id'  => NULL
        ]);
        $admin->assignRole('superadmin');

        $admin = User::create([
            'name'      => 'hanazono',
            'username'  => 'hanazono',
            'email'     => 'hanazono03@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938117',
            'store_id'  => 1
        ]);
        $admin->assignRole('store');

        $admin = User::create([
            'name'      => 'fukaya',
            'username'  => 'fukaya',
            'email'     => 'fukaya03@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938117',
            'store_id'  => 2
        ]);
        $admin->assignRole('store');

        $admin = User::create([
            'name'      => 'Asep',
            'username'  => 'Asep',
            'email'     => 'asep03@gmail.com',
            'password'  => bcrypt('12345'),
            'telephone' => '089622938118',
            'store_id'  => NULL
        ]);
        $admin->assignRole('driver');
    }
}
