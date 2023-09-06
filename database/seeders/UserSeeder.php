<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate(
            [
                'name' => 'aravind',
                'email' => 'aravindanr98@gmail.com',
                'phone' => '8754334582',
                'password' => Hash::make('Aa@13111998')
            ]
        );

        $user->assignRole('admin');
    }
}
