<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name'=>'Admin',
                'email'=>'Admin@gmail.com',
                 'is_admin'=>'1',
                'password'=> bcrypt('charki'),
            ],
             [
                'name'=>'Manager',
                'email'=>'Manager@gmail.com',
                 'is_admin'=>'2',
                'password'=> bcrypt('charki'),
             ],
             [
                'name'=>'User',
                'email'=>'User@gmail.com',
                 'is_admin'=>'0',
                'password'=> bcrypt('charki'),
             ]
        ]);
    }
}
