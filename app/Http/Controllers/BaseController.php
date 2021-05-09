<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Link;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $data;
    protected $log;

    public function __construct()
    {
        $this->log = new Activity();
        $this->data['menu'] = Link::all();


        $this->data['clients'] = [
            [
                'name' => 'John Doe',
                'position' => 'Team Leader',
                'comment' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                'image' => 'person_1.jpg'
            ],
            [
                'name' => 'Roger Scott',
                'position' => 'Marketing Manager',
                'comment' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
                'image' => 'person_2.jpg'
            ]
        ];
    }
}
