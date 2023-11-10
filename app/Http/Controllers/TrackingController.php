<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::doesntHave('tracking')->with(['sender', 'receiver'])->get();
        return view('backend.tracking.tracking', compact('invoices'));
    }

    public function filter(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        // dd($startDate, $endDate);
        $invoices = Invoice::leftJoin('trackings', 'trackings.invoice_id', '=', 'invoices.id')
        ->leftJoin('customers', 'invoices.sender_id', '=', 'customers.id')
        ->whereBetween('invoices.date', [$startDate, $endDate])
        ->select('invoices.*', 'trackings.*', 'customers.*')
        ->get();

                            // dd($invoices);

        return view('backend.tracking.tracking', compact('invoices'));
    }

}
