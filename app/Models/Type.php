<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Type extends Model
{
    use HasFactory;

    public function deleteType($id) {
        return DB::table('types')
            ->where('id', '=', $id)
            ->delete();
    }

    public function updateType($type, $id) {
        return DB::table('types')
            ->where('id', '=', $id)
            ->update($type);
    }

    public function getOne($id) {
        return DB::table('types')
            ->where('id', '=', $id)
            ->first();
    }

    public function createDrinkType($type) {
        return DB::table('types')
            ->insert($type);
    }

    public function allDrinkTypes() {
        return DB::table('types')->get();
    }

    public function getAll(Request $request) {
        $query = DB::table('types');

        $perPage = 5;
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
