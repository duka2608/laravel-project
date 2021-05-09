<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminControllers\AdminController;
use App\Http\Controllers\AdminControllers\UsersController;
use App\Http\Controllers\AdminControllers\ProductsController;
use App\Http\Controllers\AdminControllers\BrandsController;
use App\Http\Controllers\AdminControllers\DrinkTypesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;

//Middleware
use App\Http\Middleware\IsSignedIn;
use App\Http\Middleware\AdminAuth;
use App\Http\Middleware\NotSignedUser;

//Client routes
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

//Rute za registraciju i login, njima ne moze da pristupi ulogovan korisnik
Route::middleware([NotSignedUser::class])->group(function () {
    Route::get('/login', [HomeController::class, 'loginForm'])->name('login.form');
    Route::post('/login', [HomeController::class, 'login'])->name('login');
    Route::get('/registration', [HomeController::class, 'registrationForm'])->name('registration.form');
    Route::post('/registration', [HomeController::class, 'registration'])->name('registration');
});

//Rute za proizvode na klijentskoj strani
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/products/{product}', [HomeController::class, 'show'])->name('show');

//Rute za upravljanje korisnicima, proizvodima, tipovima proizvoda, brendovima, aktivnostima na sajtu kao i autorskom stranom
//Zasticene su middleware-om, tako da im moze pristupiti samo admin
Route::middleware([AdminAuth::class])->group(function () {
    Route::name('admin.')->group(function () {
        //Admin rute za rad sa korisnicima
        Route::get('/admin/users', [UsersController::class, 'index'])->name('users');
        Route::get('/admin/users/create', [UsersController::class, 'create'])->name('users.create');
        Route::post('/admin/users', [UsersController::class, 'store'])->name('users.store');
        Route::get('/admin/users/{user}', [UsersController::class, 'edit'])->name('users.edit');
        Route::put('/admin/users/{user}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/admin/users/{user}', [UsersController::class, 'destroy'])->name('users.destroy');

        //Admin rute za rad sa proizvodima
        Route::get('/admin/products', [ProductsController::class, 'index'])->name('products');
        Route::get('/admin/products/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('/admin/products', [ProductsController::class, 'store'])->name('products.store');
        Route::get('/admin/products/{product}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::put('/admin/products/{product}', [ProductsController::class, 'update'])->name('products.update');
        Route::delete('/admin/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');

        //Admin rute za upravljanje brendovima
        Route::get('/admin/brands', [BrandsController::class, 'index'])->name('brands');
        Route::get('/admin/brands/create', [BrandsController::class, 'create'])->name('brands.create');
        Route::post('/admin/brands', [BrandsController::class, 'store'])->name('brands.store');
        Route::get('/admin/brands/{brand}', [BrandsController::class, 'edit'])->name('brands.edit');
        Route::put('/admin/brands/{brand}', [BrandsController::class, 'update'])->name('brands.update');
        Route::delete('/admin/brands/{brand}', [BrandsController::class, 'destroy'])->name('brands.destroy');

        //Admin rute za upravljanje tipovima proizvoda
        Route::get('/admin/types', [DrinkTypesController::class, 'index'])->name('types');
        Route::get('/admin/types/create', [DrinkTypesController::class, 'create'])->name('types.create');
        Route::post('/admin/types', [DrinkTypesController::class, 'store'])->name('types.store');
        Route::get('/admin/types/{type}', [DrinkTypesController::class, 'edit'])->name('types.edit');
        Route::put('/admin/types/{type}', [DrinkTypesController::class, 'update'])->name('types.update');
        Route::delete('/admin/type/{type}', [DrinkTypesController::class, 'destroy'])->name('types.destroy');

        //Admin ruta za prikaz pojedinih aktivnosti na sajtu
        Route::get('/admin/activities', [AdminController::class, 'activities'])->name('activities');

        Route::get('/admin/author', function () {
            return view('pages.admin.author.index'); // Ruta za prikaz stranice o autoru
        })->name('author');
    });

});


//Rute za rad sa korpom kojom moze manipulisati samo ulogovani korisnik
Route::middleware([IsSignedIn::class])->group(function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('cart');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{product}', [CartController::class, 'deleteFromCart'])->name('cart.delete');
    Route::put('/cart', [CartController::class, 'changeQuantity'])->name('cart.update');

    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});


