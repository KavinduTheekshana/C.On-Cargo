<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabelController;
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
    Route::post('/save/customers', [CustomerController::class, 'save'])->name('customer.save');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customer/active/{id}', [CustomerController::class, 'active'])->name('customer.active');
    Route::get('/customer/diactive/{id}', [CustomerController::class, 'diactive'])->name('customer.diactive');

    //Agents
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::post('/save/agents', [AgentsController::class, 'save'])->name('agents.save');
    Route::get('/agents/delete/{id}', [AgentsController::class, 'delete'])->name('agents.delete');
    Route::get('/agents/active/{id}', [AgentsController::class, 'active'])->name('agents.active');
    Route::get('/agents/diactive/{id}', [AgentsController::class, 'diactive'])->name('agents.diactive');

    //Invoice
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/store', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoice/preview/{id}', [InvoiceController::class, 'preview'])->name('invoice.preview');
    Route::get('/invoice/label/{id}', [InvoiceController::class, 'label'])->name('invoice.label.preview');
    Route::get('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
    Route::post('/sendpdf', [InvoiceController::class, 'sendPdf']);
    Route::get('/invoice/download/{invoice_id}', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');
    Route::get('/invoices/{invoice}/details', [InvoiceController::class, 'getInvoiceDetails'])->name('invoice.details');
    // Route::get('/invoices/{invoice}/details', 'InvoiceController@getInvoiceDetails')->name('invoice.details');




});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/redirect', [HomeController::class, 'index']);

});
Route::get('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');
require __DIR__ . '/auth.php';



// Route::get('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
// Route::get('/invoice/{invoice_id}', [InvoiceController::class, 'show'])->name('invoice.show');
// Route::get('/download/{invoice_id}', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');
// Route::get('/invoice/download/{invoice_id}', 'InvoiceController@downloadPdf');
// Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
// Route::get('/label/{invoice_id}', [InvoiceController::class, 'label'])->name('invoice.show');
