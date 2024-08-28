<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(DriverSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
