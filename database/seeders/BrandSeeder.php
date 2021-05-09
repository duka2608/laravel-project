<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $brands = [ 'Bacardi', 'Jack Daniel\'s', 'Johnnie Walker', 'Ballantine\'s', 'Jim Beam', 'Russian Standard', 'Jägermeister', 'Hennessy' ];

    public function run()
    {
        for ($i = 0; $i < count($this->brands); $i++) {
            DB::table('brands')->insert([
                'name' => $this->brands[$i]
            ]);
        }

    }
}
