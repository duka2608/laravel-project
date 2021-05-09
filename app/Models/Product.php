<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function getImageId($productId) {
        return DB::table('products')
            ->select('image_id')
            ->where('id', '=' ,$productId)
            ->first();
    }

    public function deleteProduct($id) {
        DB::table('products')->where('id', $id)->delete();
    }

    public function updateProduct($data, $id) {
        DB::table('products')->where('id', $id)->update($data);
    }

    public function allWithoutParams() {
        return DB::table('products')
            ->select('products.*', 'images.path', 'images.alt', 'brands.name as brandName', 'types.name as typeName', 'volumes.volume')
            ->join('images', 'products.image_id', '=', 'images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('volumes', 'products.volume_id', '=', 'volumes.id')
            ->get();
    }

    // Metod kom se prosledjuju parametri za filtriranje i sortiranje proizvoda
    public function getAll($type = null, $volume = null, $sort = null, $brand = null){
        $query =  DB::table('products')
            ->select('products.*', 'images.path', 'images.alt', 'brands.name as brandName', 'types.name as typeName', 'volumes.volume')
            ->join('images', 'products.image_id', '=', 'images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('volumes', 'products.volume_id', '=', 'volumes.id');


        if($type) {
            $query->where('products.type_id', '=', $type);
        }

        if($volume) {
            $query->whereIn('products.volume_id', $volume);
        }

        if($brand) {
            $query->whereIn('products.brand_id', $brand);
        }

        if($sort) {
            $sortA = explode("-", $sort);
            if($sortA[1] === 'asc') {
                $query->orderBy($sortA[0]);
            } else {
                $query->orderByDesc($sortA[0]);
            }
        }


        return $query->get();
    }

    public function getOne($id) {
        return DB::table('products')
            ->select('products.*', 'images.path', 'images.alt', 'brands.name as brandName', 'types.name as typeName', 'volumes.volume')
            ->join('images', 'products.image_id', '=', 'images.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->join('types', 'products.type_id', '=', 'types.id')
            ->join('volumes', 'products.volume_id', '=', 'volumes.id')
            ->where('products.id', $id)
            ->first();
    }

    public function insertProduct($product) {
        DB::table('products')->insert($product);
    }
}
