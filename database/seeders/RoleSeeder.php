<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Business']);
        Role::create(['name' => 'Employee']);
        Role::create(['name' => 'Employer']);
        Role::create(['name' => 'Dealer']);
        Role::create(['name' => 'Agent']);


    }
}
