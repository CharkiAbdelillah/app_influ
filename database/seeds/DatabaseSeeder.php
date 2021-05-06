<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DomaineSeeder::class);
        $this->call(HistoriqueSeeder::class);
        $this->call(AdminTableSeeder::class);
        // $userData = [
        //     [
        //        'name'=>'Admin',
        //        'email'=>'johndoe@hotmail.com',
        //         'is_admin'=>'1',
        //        'password'=> bcrypt('charki'),
        //     ],
        //     [
        //        'name'=>'Regular User',
        //        'email'=>'reguser@gmail.com',
        //         'is_admin'=>'0',
        //        'password'=> bcrypt('charki'),
        //     ],
        // ];
  
        // foreach ($userData as $key => $val) {
        //     User::create($val);
        // }
    }
}
