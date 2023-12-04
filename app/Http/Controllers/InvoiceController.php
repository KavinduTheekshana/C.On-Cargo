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
use App\Models\Booking;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function sendPdf(Request $request)
    {
        $request->validate([
            'pdf' => 'required|string',
            'subject' => 'required|string',
            'receiver' => 'required|string|email',
            'message' => 'required|string',
        ]);

        $pdfData = $request->input('pdf');
        $subjectLine = $request->input('subject');
        $recipientEmail = $request->input('receiver');
        $emailMessage = $request->input('message');


        // Decode the PDF from the base64 string
        $decodedPdf = base64_decode($pdfData);

        // Use Laravel's Mailable feature to send the PDF as an attachment
        try {
            Mail::to($recipientEmail)->send(new SendPdfMail($pdfData, $subjectLine, $emailMessage));
            return response()->json(['message' => 'Invoice sent successfully']);
        } catch (\Exception $e) {
            // Handle the error
            return response()->json(['message' => 'Failed to send Invoice', 'error' => $e->getMessage()], 500);
        }
    }

    public function index()
    {
        if (Auth::user()->role == '0') {
            $invoices = Invoice::with(['sender', 'receiver'])
                ->get();
        } else {
            $invoices = Invoice::with(['sender', 'receiver'])
                ->where('user_id', Auth::id())
                ->get();
        }
        return view('backend.invoice.list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = DB::table('customers')
        ->join('users', 'customers.user_id', '=', 'users.id')
        ->where('users.role', '!=', 1)
        ->whereNull('customers.deleted_at') // Add this line to filter out soft-deleted records
        ->select('customers.*')
        ->get();
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
        $invoiceData['user_id'] = Auth::id();
        $invoice = Invoice::create($invoiceData);

        foreach ($request->items as $itemData) {
            $invoice->items()->create($itemData);
        }
        if ($request->input('action') == 'save') {
            return redirect()->route('invoice')->with('status', 'Invoice created successfully.');
        } elseif ($request->input('action') == 'preview') {
            return view('backend.invoice.preview', compact('invoice'))->with('status', 'Invoice created successfully.');
        }
    }

    public function booking(Request $request)
    {
        // Validation can be added here
        $this->validate($request, [
            'invoice_id' => 'required|string|max:255',
            'booking_id' => 'required',
            'date' => 'required|date',
            'job_number' => 'required|string|max:255',
            'customer_id' => 'required|integer|exists:customers,id',
            'sender_id' => 'required|integer|exists:customers,id',
            'receiver_id' => 'required|integer|exists:customers,id',
            'total_fee' => 'required|numeric',
            'note' => 'nullable|string'
        ]);


        $invoiceData = $request->only([
            'invoice_id', 'date', 'job_number', 'customer_id', 'sender_id','booking_id',
            'receiver_id', 'collection_fee', 'handling_fee', 'total_fee', 'note'
        ]);
        $invoiceData['user_id'] = Auth::id();
        $invoice = Invoice::create($invoiceData);
        $invoiceId = $invoice->id;
        foreach ($request->items as $itemData) {
            $invoice->items()->create($itemData);
        }

        Booking::where('id', $request->input('booking_id'))
        ->update(['invoice_id' => $invoiceId]);

        $booking = Booking::find($request->input('booking_id'));
        $booking->status = '1';
        $booking->save();

        if ($request->input('action') == 'save') {
            return redirect()->route('invoice')->with('status', 'Invoice created successfully.');
        } elseif ($request->input('action') == 'preview') {
            return view('backend.invoice.preview', compact('invoice'))->with('status', 'Invoice created successfully.');
        }
    }

    public function update(Request $request)
    {

        $invoiceId = $request->input('id');
        $invoice = Invoice::findOrFail($invoiceId);

        // Validation
        $this->validate($request, [
            'id' => 'required',
            'user_id' => 'required',
            'invoice_id' => 'required|string|max:255',
            'date' => 'required|date',
            'job_number' => 'required|string|max:255',
            'customer_id' => 'required|integer|exists:customers,id',
            'sender_id' => 'required|integer|exists:customers,id',
            'receiver_id' => 'required|integer|exists:customers,id',
            'total_fee' => 'required|numeric',
            'note' => 'nullable|string'
        ]);

        $invoice->update($request->only([
            'date', 'job_number', 'customer_id', 'sender_id',
            'receiver_id', 'total_fee', 'note'
            // Include any other fields that are part of the Invoice model
        ]));



        foreach ($request->items as $itemData) {
            // Assuming each item has an 'id' to identify whether it's an existing item
            if (isset($itemData['item_id']) && $item = $invoice->items()->find($itemData['item_id'])) {
                $item->update($itemData);
            } else {
                $invoice->items()->create($itemData);
            }
        }
        // Redirect based on action
        if ($request->input('action') == 'save') {
            return redirect()->back()->with('status', 'Invoice updated successfully.');
        } elseif ($request->input('action') == 'preview') {
            return view('backend.invoice.preview', compact('invoice'))->with('status', 'Invoice updated successfully.');
        }
    }


    public function edit($id)
    {
        $invoice = Invoice::find($id);
        $sender = Customer::find($invoice->sender_id);
        $receiver = Customer::find($invoice->receiver_id);
        $items = Item::where('invoice_id', $invoice->id)->get();
        $customers = Customer::where('status', 1)
            ->where('user_id', Auth::id())
            ->get();
        return view('backend.invoice.updateinvoice', compact('invoice', 'customers', 'items', 'sender', 'receiver'));
    }

    public function delete($id)
    {
        $Invoice = Invoice::find($id);
        $Invoice->delete();
        return response()->json(['message' => 'Invoice deleted successfully']);
    }

    public function delete_booking($id)
    {
        $Invoice = Invoice::find($id);
        $booking_id = $Invoice->booking_id;
        // return response()->json($booking_id);
        Booking::where('id', $booking_id)
        ->update(['invoice_id' => null]);

        $booking = Booking::find($booking_id);
        $booking->status = '0';
        $booking->save();
        $Invoice->delete();
        return response()->json(['message' => 'Invoice deleted successfully']);
    }


    public function preview($id)
    {
        $invoice = Invoice::with(['customer', 'sender', 'receiver', 'items'])->find($id);
        // dd($invoice);
        return view('backend.invoice.preview', compact('invoice'));
    }

    public function label($id)
    {
        $invoice = Invoice::with(['sender', 'receiver', 'items'])->find($id);
        return view('backend.invoice.label', compact('invoice'));
    }

    public function getInvoiceDetails($invoiceId)
    {
        $invoice = Invoice::with(['sender', 'receiver', 'items'])->find($invoiceId);
        return response()->json($invoice);
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
