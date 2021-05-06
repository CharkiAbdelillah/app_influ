<?php

use Illuminate\Database\Seeder;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('domaines')->insert([
            [
            'nom' => 'Beauty'
            ],[
                'nom' => 'Fashion'
            ],
            [
                'nom' => 'Artiste'
            ],[
                'nom' => 'Comédie'
            ],
            [
                'nom' => 'Lifestyle'
            ],[
            'nom' => 'Sport'
            ],
            [
                'nom' => 'Technologie'
            ],[
                'nom' => 'Photographie'
            ],
            [
                'nom' => 'Voyage'
            ]
        ]);
    }
}
