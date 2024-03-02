<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            'name' => 'Test',
            'last_name' => 'Test',
            'password' => md5('test'),
            'email' => 'test@gmail.com' ,
            'role_id' => 2,
            'phone' => '123456789',
            'address' => 'Test address',
            'city' => 'Test city',
            'avatar' => 'default.jpg',
        ]);
    }
}
