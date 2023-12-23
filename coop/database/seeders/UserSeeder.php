<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'userid' => '1111111111111' ,
                'firstname' => 'Admin' ,
                'lastname' => 'Naja' ,
                'email' => 'Admin@gmail.com' ,
                'password' => bcrypt('1234') ,
                'phoneno' => '0999999999' ,
                'urole' => 'admin' ,
                'image' => 'aaaaaa'
            ],
            [
                'userid' => '2222222222222' ,
                'firstname' => 'Student' ,
                'lastname' => 'Naju' ,
                'email' => 'Student@gmail.com' ,
                'password' => '1234' ,
                'phoneno' => '0988888888' ,
                'urole' => 'student' ,
                'image' => 'bbbbbb'
            ],
            [
                'userid' => '3333333333333' ,
                'firstname' => 'Teacher' ,
                'lastname' => 'Jubjub' ,
                'email' => 'Teacher@gmail.com' ,
                'password' => bcrypt('1234') ,
                'phoneno' => '0977777777' ,
                'urole' => 'teacher' ,
                'image' => 'cccccc'
            ]
        ]);
    }
}
