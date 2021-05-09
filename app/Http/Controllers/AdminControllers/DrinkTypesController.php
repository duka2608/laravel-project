<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;

class DrinkTypesController extends Controller
{
    private $typesModel;

    public function __construct() {
        $this->typesModel = new Type();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('pages.admin.types.index', ['items' => $this->typesModel->getAll($request)]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeName = $request->get('type_name');

        try {
          $result = $this->typesModel->createDrinkType([
              'name' => $typeName
          ]);

          if(!$result) {
              return redirect()->back()->with('error_message', 'There was an error.');
          }

          return redirect()->route('admin.types')->with('success', 'Drink type created successfully.');
        }catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = $this->typesModel->getOne($id);
        return view('pages.admin.types.edit', ['type' => $type]);
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
        $typeName = $request->get('type_name');

        try {
            $result = $this->typesModel->updateType([
                'name' => $typeName
            ], $id);

            if(!$result) {
                return redirect()->back()->with('error_message', 'An error occured.');
            }

            return redirect()->route('admin.types')->with('success', 'Drink type updated.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error.');
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
            $result = $this->typesModel->deleteType($id);
            if (!$result) {
                return redirect()->back()->with('error_message', 'There was an error while deleting selected drink type.');
            }

            return redirect()->back()->with('success', 'Drink type successfully deleted.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'There was an error.');
        }
    }
}
