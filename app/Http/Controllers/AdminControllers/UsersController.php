<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // U ovom kontroleru su pokrivene sve funkcionalnosti vezane za korisnike na admin stranici
    // Omoguceni su prikaz, unos, izmena i brisanje korisnika
    // Omogucena je pretraga i paginacija


    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function index(Request $request)
    {
        if($request->has('keyword')) {
            $users = $this->userModel->allUsers($request);
            return response()->json($users);
        } else {
            $users = $this->userModel->allUsers($request);
        }


        return view('pages.admin.users.users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationRequest $request)
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $registration = $this->userModel->registration(
                [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "username" => $username,
                    "email" => $email,
                    "input_password" => $password,
                    "password" => md5($password),
                    "role_id" => 2
                ]
            );

            if(!$registration){
                return redirect()->back()->with('error_message', 'Failed to create account !');
            }

            return redirect()->route('admin.users')->with('message', 'Account created successfully !');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'Failed to create account !');
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
        $user = $this->userModel->singleUser($id);

        return view('pages.admin.users.edit', ['user' => $user]);
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
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $update = $this->userModel->updateUser(
                [
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "username" => $username,
                    "email" => $email,
                    "input_password" => $password,
                    "password" => md5($password)
                ], $id
            );

            if(!$update){
                return redirect()->back()->with('error_message', 'Failed to update account !');
            }

            return redirect()->route('admin.users')->with('message', 'Account updated successfully !');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'Failed to update account !');
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
            $result = $this->userModel->deleteUser($id);

            if(!$result) {
                return redirect()->back()->with('error_message', 'Selected user was not deleted.');
            }

            return redirect()->back()->with('message', 'User successfully deleted.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back()->with('error_message', 'Selected user was not deleted.');
        }
    }
}
