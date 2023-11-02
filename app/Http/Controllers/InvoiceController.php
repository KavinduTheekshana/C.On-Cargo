<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Customer::all();
        return view('backend.invoice.list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $lastInvoiceId = Invoice::max('id');
        $nextInvoiceId = $lastInvoiceId + 1;
        return view('backend.invoice.create', compact('customers','nextInvoiceId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        // Validation can be added here
        $invoiceData = $request->only([
            'invoice_id', 'date', 'job_number', 'customer_id', 'sender_id', 
            'receiver_id', 'collection_fee', 'handling_fee', 'total_fee', 'note'
        ]);

        $invoice = Invoice::create($invoiceData);

        foreach ($request->items as $itemData) {
            $invoice->items()->create($itemData);
        }
        // return redirect()->back()->with('status', 'New Customer Added Sucessfully');
        return redirect()->back()->with('status', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
