<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            ['name' => 'Admin', 'description' => 'Administrator role', 'publish' => 1],
            ['name' => 'Employee', 'description' => 'General user role', 'publish' => 1],
        ]);
    }
}
