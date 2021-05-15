<?php

use Illuminate\Database\Seeder;

class HistoriqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historiques')->insert([
            [
            'nom' => 'Shooting'
        ],[
            'nom' => 'Invitée d’honneur'
        ],
        [
            'nom' => 'Test de produits'
        ],[
            'nom' => 'Ambassadeur'
        ],
        [
            'nom' => 'Placement produit'
        ],[
            'nom' => 'Publicité'
        ]
        ]);
    }
}
