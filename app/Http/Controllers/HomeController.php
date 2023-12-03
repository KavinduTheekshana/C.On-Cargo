<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        if ($role == "0") {
            return view('backend.admin.dashboard');
        }
    }

    public function dashboard()
    {
        $agents_count = User::where('role', 1)->count();
        $pending_bookings = Booking::where('status', 0)->count();
        $customers_count = DB::table('customers')
                ->join('users', 'customers.user_id', '=', 'users.id')
                ->where('users.role', '!=', 1)
                ->select('customers.*')
                ->count();
        $invoice_count = Invoice::where('user_id', Auth::id())->count();
        return view('backend.dashboard.dashboard', compact('agents_count', 'pending_bookings','customers_count','invoice_count'));
    }
}
