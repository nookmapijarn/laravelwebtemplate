<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            [
                'fullname' => 'John Deo',
                'gender' => 'Male',
                'email' => 'john@email.com',
                'tel' => '0889999999',
                'age' => 30,
                'address' => '8/80 moo.8 bagnkok',
                'avartar' => 'noavatar.jpg',
                'status' => 1
            ],
            [
                'fullname' => 'สมชาย ใจดี',
                'gender' => 'Male',
                'email' => 'somchai@email.com',
                'tel' => '02098939223',
                'age' => 20,
                'address' => '9/99 moo.9 bagnkok',
                'avartar' => 'noavatar.jpg',
                'status' => 1
            ],
            [
                'fullname' => 'Siriwan Kongman',
                'gender' => 'Female',
                'email' => 'siriwan@email.com',
                'tel' => '08799329232',
                'age' => 27,
                'address' => '366 chonburi',
                'avartar' => 'noavatar.jpg',
                'status' => 1
            ]
        ]);
    }
}
