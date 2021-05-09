<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;

class BrandsController extends Controller
{
    private $brandsModel;

    public function __construct() {
        $this->brandsModel = new Brand();
    }

    public function index(Request $request) {
        return view('pages.admin.brands.index', ['items' => $this->brandsModel->getAll($request)]);
    }

    public function create() {
        return view('pages.admin.brands.create');
    }

    public function update(Request $request, $id) {
        $brandName = $request->get('brand_name');

        try {
            $result = $this->brandsModel->updateBrand([
                'name' => $brandName
            ], $id);

            if (!$result) {
                return redirect()->back()->with('error_message', 'There was an error.');
            }

            return redirect()->route('admin.brands')->with('success', 'Brand successfully updated.');
        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error.');
        }
    }

    public function edit($id) {
        $brand = $this->brandsModel->getOne($id);
        return view('pages.admin.brands.edit', ['brand' => $brand]);
    }

    public function store(CreateBrandRequest $request) {
        $brandName = $request->get('brand_name');

        try {
            $result = $this->brandsModel->storeBrand([
                'name' => $brandName
            ]);

            if (!$result) {
                return redirect()->back()->with('error_message', 'There was an error.');
            }

            return redirect()->route('admin.brands')->with('success', 'Brand successfully added.');
        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error.');
        }
    }

    public function destroy($id) {
        try {
            $result = $this->brandsModel->deleteBrand($id);
            if (!$result) {
                return redirect()->back()->with('error_message', 'There was an error while deleting selected brand.');
            }

            return redirect()->back()->with('success', 'Brand successfully deleted.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error while deleting selected brand.');
        }
    }
}
