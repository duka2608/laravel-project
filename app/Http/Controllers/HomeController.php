<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Type;
use App\Models\User;
use App\Models\Volume;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;

class HomeController extends BaseController
{
    public function home() {
        return view('pages.client.home', $this->data);
    }

    public function loginForm() {
        return view('pages.client.login', $this->data);
    }

    public function login(LoginRequest $request) {
        $email = $request->input('email');
        $password = md5($request->input('password'));

        try {
            $userModel = new User();
            $user = $userModel->login($email, $password); //Metod u User modelu koji sluzi za prikupljanje informacija o osobi koja je unela podatke

            if($user) {
                $request->session()->put('user', $user);
                $request->session()->put('cartContent', []);
                if($user->role_name === "Admin") {
                    return redirect()->route('admin.users');
                    $this->log->logActivity([
                        'user_id' => $request->session()->get('user')->id,
                        'activity' => 'Sign in'
                    ]);
                }
                //Unos aktivnosti korisnika u bazu podataka, ovaj metod se nalazi u modelu Activity
                $this->log->logActivity([
                    'user_id' => $request->session()->get('user')->id,
                    'activity' => 'Sign in'
                ]);
                return redirect()->route('home');
            }

            return redirect()->route('login')->with(['error_message' => 'Login unsuccessful, invalid e-mail or password.']);
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->route('login')->with(['error_message' => 'There was an error.']);
        }
    }

    public function logout(Request $request) {
        $this->log->logActivity([
            'user_id' => $request->session()->get('user')->id,
            'activity' => 'Log out'
        ]);
        $request->session()->remove('user');
        return redirect()->route('home');
    }

    public function registrationForm() {
        return view('pages.client.registration', $this->data);
    }

    public function registration(RegistrationRequest $request) {
        // Funkcija za pravljenje novog naloga
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        try {
            $userModel = new User();
            $registration = $userModel->registration(
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
                return redirect()->back()->with('error', 'There was an error.');
            }

            return redirect()->route('login')->with('success', 'Account created successfully, now you can sign in.');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            return redirect()->back();
        }
    }

    public function about() {
        return view('pages.client.about', $this->data);
    }

    public function products(Request $request) {
        //Funkcija koja sluzi za preuzimanje korisnickog izbora za filtriranje i sortiranje
        //Podaci se dalje prosledjuju metodu u Product modelu
        $productsModel = new Product();

        $type = $request->has('type') ? $request->get('type') : null;
        $volume = $request->has('volume') ? $request->get('volume') : [];
        $brand = $request->has('brand') ? $request->get('brand') : [];
        $sort = $request->has('sort') ? $request->get('sort') : null;


        if($type || $sort || $volume || $brand) {
            $products = $productsModel->getAll($type, $volume, $sort, $brand);
            return response()->json($products);
        } else {
            $this->data['products'] = $productsModel->getAll();
        }

        // Ovaj deo sa eloquentom je odradjen jos na pocetku izrade sajta jer sam se jos dvoumio da li koristiti njega ili Query builder
        $this->data['types'] = Type::all();
        $this->data['volumes'] = Volume::all();
        $this->data['brands'] = Brand::all();
        return view('pages.client.products', $this->data);
    }

    public function show($product) {
        $productsModel = new Product();
        $this->data['product'] = $productsModel->getOne($product);
        return view('pages.client.product', $this->data);
    }
}
