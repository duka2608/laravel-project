<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    use HasFactory;

    public function logActivity($activity) {
        DB::table('activities')
            ->insert($activity);
    }

    public function getActivities(Request $request) {
        $query = DB::table('activities')->join('users', 'activities.user_id', '=', 'users.id');

        $perPage = 10;
        $page = $request->has('page') ? $request->get('page') : 1;

        $total = $query->count();

        $query = $query->limit($perPage);
        $offset = ((int)$page - 1) * $perPage;
        $query = $query->skip($offset);

        $response = new \stdClass();
        $response->items = $query->get();

        $response->pagesCount = ceil($total/$perPage);

        return $response;
    }
}
