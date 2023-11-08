<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with(['sender', 'receiver'])
        ->orderBy('created_at', 'desc')
        ->get();
        return view('backend.label.list', compact('invoices'));
    }
    public function create()
    {
        $customers = Customer::where('status', 1)->get();
        $lastInvoiceId = Label::max('id');
        $nextInvoiceId = $lastInvoiceId + 1;
        $nextInvoiceNumber = str_pad($nextInvoiceId, 5, '0', STR_PAD_LEFT);
        // dd($nextInvoiceNumber);
        return view('backend.label.create', compact('customers', 'nextInvoiceNumber'));
    }
}
