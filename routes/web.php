<?php

use App\Http\Controllers\AgentsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrackingController;
use Illuminate\Support\Facades\Auth;
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

Route::get('user/login', function () {
    if (Auth::check()) {
        return redirect('user/dashboard');
    }
    return view('frontend.login.login');
})->name('user/login');

Route::get('user/register', function () {
    if (Auth::check()) {
        return redirect('user/dashboard');
    }
    return view('frontend.login.register');
})->name('user/register');

Route::get('user/forgot-password', function () {
    if (Auth::check()) {
        return redirect('user/dashboard');
    }
    return view('frontend.login.forgot-password');
})->name('user/forgot-password');

Route::post('regularuser', [ProfileController::class, 'regularuser'])->name('regularuser');

Route::middleware(['userOnly'])->group(function () {
    Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user/dashboard');
    Route::post('user/save/customers', [CustomerController::class, 'saveaddress'])->name('user.customer.save');
    Route::post('user/booking/store', [BookingController::class, 'store'])->name('user.booking.store');
    Route::get('/address/delete/{id}', [CustomerController::class, 'delete'])->name('address.delete');
    Route::get('/booking/delete/{id}', [BookingController::class, 'delete'])->name('booking.delete');
    Route::post('/regularuser/password/update', [ProfileController::class, 'updatePassword'])->name('regularuser.password.update');
});


// Error Route
Route::get('/error', function () {
    return view('backend.error');
})->name('error');

// -------------------Back End Admins---------------------------------------------
Route::middleware(['adminOnly'])->group(function () {
    //Agents
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::post('/save/agents', [AgentsController::class, 'save'])->name('agents.save');
    Route::get('/agents/delete/{id}', [AgentsController::class, 'delete'])->name('agents.delete');
    Route::get('/agents/active/{id}', [AgentsController::class, 'active'])->name('agents.active');
    Route::get('/agents/diactive/{id}', [AgentsController::class, 'diactive'])->name('agents.diactive');

    // Tracking
    Route::get('/tracking', [TrackingController::class, 'index'])->name('tracking');
    Route::get('/filter-invoices', [TrackingController::class, 'filter'])->name('filter.invoices');
    Route::get('/tracking/{invoice}/details', [TrackingController::class, 'getTrackingDetails'])->name('tracking.details');
    Route::post('/track-invoice', [TrackingController::class, 'trackInvoice'])->name('track.invoice');

     // Bookings
     Route::get('/bookings', [BookingController::class, 'index'])->name('bookings');
     Route::get('/booking/create/{id}', [BookingController::class, 'create'])->name('booking.create');
     Route::get('/booking/delete/admin/{id}', [BookingController::class, 'deleteadmin'])->name('booking.delete.admin');
     Route::get('/booking/diactive/{id}', [BookingController::class, 'diactive'])->name('booking.diactive');
    Route::get('/booking/active/{id}', [BookingController::class, 'active'])->name('booking.active');
    Route::get('/copy-customer/{customer_id}', [BookingController::class, 'copyCustomer'])->name('copy.customer');
});
Route::middleware('adminOrAgent')->group(function () {
    // Dashboard Routes

    Route::get('/dashboard', function () {
        return view('backend.dashboard.dashboard');
    })->name('dashboard');

    Route::get('/userprofile', [ProfileController::class, 'userprofile'])->name('userprofile');

    //Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/customers/details/{id}', [CustomerController::class, 'getDetails'])->name('customers.details');
    Route::post('/save/customers', [CustomerController::class, 'save'])->name('customer.save');
    Route::post('/update/customers', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
    Route::get('/customer/active/{id}', [CustomerController::class, 'active'])->name('customer.active');
    Route::get('/customer/diactive/{id}', [CustomerController::class, 'diactive'])->name('customer.diactive');
    Route::get('/get-invoice-details/{customer_id}', [CustomerController::class, 'getCustomerInvoices'])->name('customer.invoices');

    //Invoice
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('invoice/store', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::post('invoice/update', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::get('/invoice/preview/{id}', [InvoiceController::class, 'preview'])->name('invoice.preview');
    Route::get('/invoice/edit/{id}', [InvoiceController::class, 'edit'])->name('invoice.edit');
    Route::get('/invoice/label/{id}', [InvoiceController::class, 'label'])->name('invoice.label.preview');
    Route::get('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
    Route::post('/sendpdf', [InvoiceController::class, 'sendPdf']);
    Route::get('/invoice/download/{invoice_id}', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');
    Route::get('/invoices/{invoice}/details', [InvoiceController::class, 'getInvoiceDetails'])->name('invoice.details');
    Route::post('/user/password/update', [ProfileController::class, 'updatePassword'])->name('user.password.update');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/redirect', [HomeController::class, 'index']);
});

Route::get('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');
require __DIR__ . '/auth.php';



// Route::get('/invoice/delete/{id}', [InvoiceController::class, 'delete'])->name('invoice.delete');
// Route::get('/invoice/{invoice_id}', [InvoiceController::class, 'show'])->name('invoice.show');
// Route::get('/download/{invoice_id}', [InvoiceController::class, 'downloadPdf'])->name('invoice.download');
// Route::get('/invoice/download/{invoice_id}', 'InvoiceController@downloadPdf');
// Route::get('/customer/delete/{id}', [CustomerController::class, 'delete'])->name('customer.delete');
// Route::get('/label/{invoice_id}', [InvoiceController::class, 'label'])->name('invoice.show');


// Route::get('/get-invoice-details/{customer_id}', [CustomerController::class, 'getCustomerInvoices'])->name('customer.invoices');
