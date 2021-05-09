<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Image extends Model
{
    use HasFactory;

    public function insertPicture($image) {
        return DB::table('images')->insertGetId($image);
    }

    public function deletePicture($id) {
        return DB::table('images')
            ->where('id', '=', $id)
            ->delete();
    }

    public function getOne($id) {
        return DB::table('images')
            ->where('id', '=', $id)
            ->first();
    }
}
