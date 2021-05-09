<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Volume extends Model
{
    use HasFactory;

    public function getAll() {
        return DB::table('volumes')->get();
    }
}
