<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Type;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsModel = new Product();

        return view('pages.admin.products.products', ['products' => $productsModel->getAll()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brandModel = new Brand();
        $volumeModel = new Volume();
        $typeModel = new Type();

        return view('pages.admin.products.create', [
            'brands' => $brandModel->allBrands(),
            'volumes' => $volumeModel->getAll(),
            'types' => $typeModel->allDrinkTypes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $image = $request->file('image');
        $fileName = time().".".$image->extension();

        try {
            $result = $image->storeAs('public/assets/images/products', $fileName);

            if(!$result) {
                return redirect()->back()->with('error', 'There was an error while uploading image.');
            }

            $imageModel = new Image();
            $imageId = $imageModel->insertPicture([
                'path' => $fileName,
                'alt' => $request->input('product_name')
            ]);

            $productModel = new Product();

            $productModel->insertProduct([
                'id' => null,
                'name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'volume_id' => $request->input('volume'),
                'brand_id' => $request->input('brands'),
                'type_id' => $request->input('types'),
                'image_id' => $imageId
            ]);

            return redirect()->route('admin.products')->with('success', 'Product added successfully.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', 'There was an error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productsModel = new Product();
        $brandModel = new Brand();
        $volumeModel = new Volume();
        $typeModel = new Type();

        return view('pages.admin.products.edit', [
            'product' => $productsModel->getOne($id),
            'volumes' => $volumeModel->getAll(),
            'brands' => $brandModel->allBrands(),
            'types' => $typeModel->allDrinkTypes()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $productModel = new Product();

        try {
            $oldId = $productModel->getImageId($id)->image_id;

            if($image != null) {

                $fileName = time().".".$image->extension();

                $result = $image->storeAs('public/assets/images/products', $fileName);
                if(!$result) {
                    return redirect()->back()->with('error', 'There was an error while uploading image.');
                }

                $imageModel = new Image();
                $imageId = $imageModel->insertPicture([
                    'path' => $fileName,
                    'alt' => $request->input('product_name')
                ]);

            }


            $productModel->updateProduct([
                'name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'description' => $request->input('description'),
                'volume_id' => $request->input('volume'),
                'brand_id' => $request->input('brands'),
                'type_id' => $request->input('types'),
                'image_id' => $image ? $imageId : $oldId
            ], $id);

            if($image) {
                $imageModel = new Image();
                $imageForDelete = $imageModel->getOne($oldId);
                $imageModel->deletePicture($oldId);
                Storage::delete('public/assets/images/products/'.$imageForDelete->path);
            }

            return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', 'There was an error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $productsModel = new Product();
            $imagesModel = new Image();

            $imageId = $productsModel->getImageId($id);
            $imageForDelete = $imagesModel->getOne($imageId->image_id);

            $imagesModel->deletePicture($imageId->image_id);
            Storage::delete('public/assets/images/products/'.$imageForDelete->path);

            $productsModel->deleteProduct($id);


            return response()->json($productsModel->allWithoutParams());
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error', 'There was an error.');
        }
    }
}
