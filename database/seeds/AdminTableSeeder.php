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
        DB::table('users')->insert(
            // [
            //     'name'=>'Admin',
            //     'email'=>'johndoe@hotmail.com',
            //      'is_admin'=>'1',
            //     'password'=> bcrypt('charki'),
            //  ]
             [
                'name'=>'Manager',
                'email'=>'charki@gmail.com',
                 'is_admin'=>'2',
                'password'=> bcrypt('charki'),
             ]
        );
    }
}
