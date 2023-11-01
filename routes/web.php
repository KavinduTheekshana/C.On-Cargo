<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -------------------Front End---------------------------------------------
Route::get('/', function () {
    return view('frontend.home.index');
})->name('/');
Route::get('about', function () {
    return view('frontend.about.index');
})->name('about');
Route::get('services', function () {
    return view('frontend.services.index');
})->name('services');
Route::get('contact', function () {
    return view('frontend.contact.index');
})->name('contact');


// -------------------Back End---------------------------------------------
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.dashboard.dashboard');
    })->name('dashboard');


  //Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::post('/save-customers', [CustomerController::class, 'save'])->name('customer.save');
    Route::get('/customer-delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customer-active/{id}', [CustomerController::class, 'active'])->name('customer.active');
    Route::get('/customer-diactive/{id}', [CustomerController::class, 'diactive'])->name('customer.diactive');

    //Invoice
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/create', [InvoiceController::class, 'create'])->name('create');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/redirect', [HomeController::class, 'index']);
   
});
Route::post('/save-customers', [CustomerController::class, 'save'])->name('customer.save');
require __DIR__.'/auth.php';
