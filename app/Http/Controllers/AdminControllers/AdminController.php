<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends BaseController
{
    public function activities(Request $request) {
        return view('pages.admin.activities.index', ['items' => $this->log->getActivities($request)]);
    }
}
