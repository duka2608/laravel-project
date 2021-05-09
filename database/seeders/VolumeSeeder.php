<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $volumes = [ 0.5, 0.70, 0.75, 1, 1.75 ];

    public function run()
    {
        for ($i = 0; $i < count($this->volumes); $i++) {
            DB::table('volumes')->insert([
                'volume' => $this->volumes[$i]
            ]);
        }
    }
}
