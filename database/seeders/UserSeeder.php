<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // dummy data
        $names = ['Admin', 'Joe'];
        $emails = ['admin@example.com', 'joe@mama.com'];
        $passwords = ['admin', 'mama'];
        $genders = ['Male', 'Female'];
        $addresses = ['123 Street', 'Joe Street'];
        $roles = [1, 2];

        for ($i = 0; $i < count($names); $i++) {
            User::create([
                'name' => $names[$i],
                'email' => $emails[$i],
                'password' => $passwords[$i],
                'gender' => $genders[$i],
                'address' => $addresses[$i],
                'role_id' => $roles[$i]
            ]);
        }
    }
}
