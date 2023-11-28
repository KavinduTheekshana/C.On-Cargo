<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $address = Customer::where('user_id', Auth::id())->get();
        $bookings = Booking::with(['sender', 'receiver'])
                   ->where('user_id', Auth::id())
                   ->orderBy('created_at', 'desc') // Order by descending order of creation date
                   ->get();

        return view('frontend.login.dashboard', compact('address', 'bookings'));
        // return view('frontend.login.dashboard');
    }
}
