<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            'name' => 'Solar Halos',
        ]);
        DB::table('artists')->insert([
            'name' => 'Caltrop',
        ]);
        DB::table('artists')->insert([
            'name' => 'Wizzerds of Rhyme',
        ]);
        DB::table('artists')->insert([
            'name' => 'And You Will Know Us By The Trail Of Dead',
        ]);
    }
}
