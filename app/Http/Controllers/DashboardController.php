<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $address = Customer::where('user_id', Auth::id())->get();
        return view('frontend.login.dashboard', compact('address'));
        // return view('frontend.login.dashboard');
    }
}
