<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run()
    {
        DB::table('accounts')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('adminpassword'),
                'name' => 'Admin User',
                'role' => 'admin',
            ],
            [
                'username' => 'author',
                'password' => Hash::make('authorpassword'),
                'name' => 'Author User',
                'role' => 'author',
            ],
        ]);
    }
}
