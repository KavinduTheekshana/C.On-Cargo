<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDFWrapper;
use App\Mail\SendPdfMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Mail\PdfMail;

class InvoiceController extends Controller
{
    public function sendPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|string', // Ensure that you're receiving a string
        ]);

        $pdfData = $request->input('pdf');
        $recipientEmail = 'kavindutheekshana@gmail.com'; // The email where you want to send the PDF

        // Decode the PDF from the base64 string
        $decodedPdf = base64_decode($pdfData);

        // Use Laravel's Mailable feature to send the PDF as an attachment
        try {
            Mail::to($recipientEmail)->send(new SendPdfMail($pdfData));
            return response()->json(['message' => 'PDF sent successfully']);
        } catch (\Exception $e) {
            // Handle the error
            return response()->json(['message' => 'Failed to send PDF', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $invoices = Invoice::with(['sender', 'receiver'])
        ->orderBy('created_at', 'desc')
        ->get();
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
        $nextInvoiceNumber = str_pad($nextInvoiceId, 5, '0', STR_PAD_LEFT);
        // dd($nextInvoiceNumber);
        return view('backend.invoice.create', compact('customers', 'nextInvoiceNumber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation can be added here
        $this->validate($request, [
            'invoice_id' => 'required|string|max:255',
            'date' => 'required|date',
            'job_number' => 'required|string|max:255',
            'customer_id' => 'required|integer|exists:customers,id',
            'sender_id' => 'required|integer|exists:customers,id',
            'receiver_id' => 'required|integer|exists:customers,id',
            'total_fee' => 'required|numeric',
            'note' => 'nullable|string'
        ]);


        $invoiceData = $request->only([
            'invoice_id', 'date', 'job_number', 'customer_id', 'sender_id',
            'receiver_id', 'collection_fee', 'handling_fee', 'total_fee', 'note'
        ]);

        $invoice = Invoice::create($invoiceData);

        foreach ($request->items as $itemData) {
            $invoice->items()->create($itemData);
        }
        if ($request->input('action') == 'save') {
            return redirect()->back()->with('status', 'Invoice created successfullyyyyyyyyy.');
        } elseif ($request->input('action') == 'preview') {
            return redirect()->back()->with('status', 'Invoice created successfully.');
        }
    }

    public function delete($id)
    {
        $Invoice = Invoice::find($id);
        $Invoice->delete();
        return response()->json(['message' => 'Invoice deleted successfully']);
    }


    public function preview($id)
    {
        $invoice = Invoice::with(['sender', 'receiver', 'items'])->find($id);
        return view('backend.invoice.preview', compact('invoice'));
    }

    // public function Download($id)
    // {
    //     $invoice = Invoice::with(['sender', 'receiver', 'items'])->find($id);
    //     return view('invoices', compact('invoice'));
    // }

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


    public function show($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);

        // Handle the case where the invoice isn't found
        if (!$invoice) {
            abort(404);
        }

        return view('invoicedownload', compact('invoice'));
    }
    public function downloadPdf($invoice_id)
    {
        $invoice = Invoice::find($invoice_id);

        // Handle the case where the invoice isn't found
        if (!$invoice) {
            abort(404);
        }

        $pdf = PDF::loadView('invoicedownload', compact('invoice'))
        ->setPaper('A4', 'portrait');

        // Return the PDF download
        return $pdf->download("invoice_{$invoice->id}.pdf");
    }
}
