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
        $roles = ['Admin', 'Member', 'Guest'];

        for ($i = 0; $i < count($roles); $i++) {
            Role::create([
                'name' => $roles[$i]
            ]);
        }
    }
}
