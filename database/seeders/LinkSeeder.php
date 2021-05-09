<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $links = [
        [
            'name' => 'Home',
            'route' => 'home'
        ],
        [
            'name' => 'About',
            'route' => 'about'
        ],
        [
            'name' => 'Products',
            'route' => 'products'
        ],
        [
            'name' => 'Contact',
            'route' => 'contact'
        ]
    ];

    public function run()
    {
        foreach ($this->links as $link) {
            DB::table('links')->insert([
                'name' => $link['name'],
                'route' => $link['route']
            ]);
        }
    }
}
