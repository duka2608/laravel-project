<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    use HasFactory;

    public function updateBrand($data, $id) {
        return DB::table('brands')
            ->where('id', '=', $id)
            ->update($data);
    }

    public function getOne($id) {
        return DB::table('brands')
            ->where('id', '=', $id)
            ->first();
    }

    public function storeBrand($brand) {
        return DB::table('brands')
            ->insert($brand);
    }

    public function deleteBrand($id) {
        return DB::table('brands')
            ->where('id', '=', $id)
            ->delete();
    }

    public function allBrands() {
        return DB::table('brands')->get();
    }

    public function getAll(Request $request) {
        $query = DB::table('brands');

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
