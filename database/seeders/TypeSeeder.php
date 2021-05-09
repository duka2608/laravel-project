<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $types = [ 'Whisky', 'Liqueurs', 'Vodka', 'Rum', 'Gin', 'Brandy' ];

    public function run()
    {
        for($i = 0; $i < count($this->types); $i++) {
            DB::table('types')->insert([
                'name' => $this->types[$i]
            ]);
        }
    }
}
