<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'admin@gamerwaitlist.com',
            'password' => Hash::make('admin*!123'),
            'referral_key' => '',
            'start_position' => 0,
            'role_type' => USER_ROLES['ADMIN']
        ]);
    }
}
