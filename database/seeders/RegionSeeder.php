<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('regions')->insert([
        	'name' => 'Eropa',
        ]);

        DB::table('regions')->insert([
        	'name' => 'Amerika',
        ]);

        DB::table('regions')->insert([
        	'name' => 'Asia',
        ]);
    }
}
