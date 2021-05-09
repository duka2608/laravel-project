<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;

    public function deleteUser($id) {
        return DB::table('users')
            ->where('users.id', $id)
            ->delete();
    }

    public function updateUser($data, $id) {
       return DB::table('users')
            ->where('users.id', $id)
            ->update($data);
    }

    public function singleUser($id) {
        return DB::table('users')
            ->select('users.*', 'roles.name as role_name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where([
                ['roles.id', 2],
                ['users.id', $id]
            ])
            ->first();
    }

    public function allUsers(Request $request) {
        $query = DB::table('users')
            ->select('users.*', 'roles.name as role_name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.id', 2);

            $perPage = 5;
            $page = $request->has('page') ? $request->get('page') : 1;

            if($request->get('keyword') !== null) {
                session()->put('keyword', $request->get('keyword'));
                $query->where('users.first_name', 'like', '%'.$request->get('keyword').'%');
                $query->orWhere('users.last_name', 'like', '%'.$request->get('keyword').'%');
                $total = $query->count();

                $query = $query->limit($perPage);
                $offset = ((int)$page - 1) * $perPage;
                $query = $query->skip($offset);

                $response = new \stdClass();
                $response->items = $query->get();

                $response->pagesCount = ceil($total/$perPage);

                return $response;
            } else {
                $total = $query->count();

                $query = $query->limit($perPage);
                $offset = ((int)$page - 1) * $perPage;
                $query = $query->skip($offset);

                $response = new \stdClass();
                $response->items = $query->get();

                $response->pagesCount = ceil($total/$perPage);
                session()->remove('keyword');
                return $response;
            }
    }

    public function registration($user) {
        return DB::table('users')->insert($user);
    }

    public function login($email, $password) {
        return DB::table('users')
            ->select('users.*', 'roles.name as role_name')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->where([
            [ 'email', '=', $email ],
            [ 'password', '=', $password ]
        ])->first();
    }
}
