<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert data ke table detail_profile
        DB::table('detail_profile')->insert([
            'address'   => 'Jember',
            'nomor_tlp' => '08xxxxxx',
            'ttl'       => '2004-06-28',
            'foto'      => 'picture.png'
        ]);
    }
}