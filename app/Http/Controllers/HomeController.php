<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
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

        if (Auth::user()->role == 0) {
            $invoice_count = Invoice::count();
        } else {
            $invoice_count = Invoice::where('user_id', Auth::id())->count();
        }
        // Calculate the date 12 months ago from today
        $startDate = Carbon::now()->subMonths(11)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Fetch bookings data for the past 12 months
        $monthlyBookings = Booking::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('count(*) as total'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $labels = $monthlyBookings->pluck('month');
        $totals = $monthlyBookings->pluck('total');


        $activeCustomersCount = Customer::where('status', 1)->count();
        $inactiveCustomersCount = Customer::where('status', 0)->count();
        $totalCustomers = $activeCustomersCount + $inactiveCustomersCount;

    // Calculate percentages
    $activePercentage = ($activeCustomersCount / $totalCustomers) * 100;
    $inactivePercentage = ($inactiveCustomersCount / $totalCustomers) * 100;

        return view('backend.dashboard.dashboard', compact('agents_count', 'pending_bookings', 'customers_count',
         'invoice_count', 'labels', 'totals', 'activeCustomersCount', 'inactiveCustomersCount','activePercentage','inactivePercentage'));
    }
}
