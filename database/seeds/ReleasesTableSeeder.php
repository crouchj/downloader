<?php

use Illuminate\Database\Seeder;

class ReleasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('releases')->insert([
            'release_number' => 'CC001',
            'artist_id' => 1,
            'title' => 'Solar Halos',
        ]);
        DB::table('releases')->insert([
            'release_number' => 'CC002',
            'artist_id' => 1,
            'title' => '08.21.17',
        ]);
        DB::table('releases')->insert([
            'release_number' => 'CC003',
            'artist_id' => 2,
            'title' => 'ten million years and eight minutes',
        ]);
        DB::table('releases')->insert([
            'release_number' => 'CC004',
            'artist_id' => 4,
            'title' => 'Some Trail of Dead Album',
        ]);
    }
}
