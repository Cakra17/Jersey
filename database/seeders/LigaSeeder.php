<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ligas')->insert([
        	'name' => 'Bundesliga',
        	'country' => 'Jerman',
        	'image' => 'bundesliga.png',
            'region_id' => '1',
        ]);

        DB::table('ligas')->insert([
        	'name' => 'Premier League',
        	'country' => 'Inggris',
        	'image' => 'premierleague.png',
            'region_id' => '1',
        ]);

        DB::table('ligas')->insert([
        	'name' => 'La Liga',
        	'country' => 'Spanyol',
        	'image' => 'laliga.png',
            'region_id' => '1'
        ]);

        DB::table('ligas')->insert([
        	'name' => 'Serie A',
        	'country' => 'Itali',
        	'image' => 'seriea.png',
            'region_id' => '1'
        ]);
    }
}
