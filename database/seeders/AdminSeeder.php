<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $first_role_id = Role::first()->id;

        Admin::create([
            'name' => 'Admin',
            'email'=>"admin@admin.com",
            'password'=>bcrypt('12345678'),
            'role_id'=> $first_role_id,
        ]);
    }
}
