<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $from_country = $request->from_country;
        $to_country = $request->to_country;

        // $invoices = Invoice::leftJoin('trackings', 'trackings.invoice_id', '=', 'invoices.id')
        //     ->leftJoin('customers', 'invoices.sender_id', '=', 'customers.id')
        //     ->whereBetween('invoices.date', [$startDate, $endDate])
        //     ->select(
        //         'invoices.id as id',
        //         'invoices.invoice_id as invoice_id',
        //         'trackings.id as tracking_id',
        //         'customers.firstname as sender_first_name',
        //         'customers.lastname as sender_last_name',
        //         'customers.address as sender_address',
        //         'invoices.date as invoice_date',
        //         'invoices.total_fee as invoice_amount',
        //         'trackings.arrived_at as tracking_arrived_at',
        //         'trackings.departed_at as tracking_departed_at',
        //         'trackings.stop_id as tracking_id'
        //     )
        //     ->get();

        $invoices = Invoice::leftJoin('trackings', 'trackings.invoice_id', '=', 'invoices.id')
            ->leftJoin('customers as sender', 'invoices.sender_id', '=', 'sender.id')
            ->leftJoin('customers as receiver', 'invoices.receiver_id', '=', 'receiver.id')
            ->whereBetween('invoices.date', [$startDate, $endDate])
            ->when($from_country, function ($query, $from_country) {
                return $query->where('sender.country', $from_country);
            })
            ->when($to_country, function ($query, $to_country) {
                return $query->where('receiver.country', $to_country);
            })
            ->select(
                'invoices.id as id',
                'invoices.invoice_id as invoice_id',
                'trackings.id as tracking_id',
                'sender.firstname as sender_first_name',
                'sender.lastname as sender_last_name',
                'sender.address as sender_address',
                'sender.country as sender_country',
                'receiver.country as receiver_country',
                'invoices.date as invoice_date',
                'invoices.total_fee as invoice_amount',
                'trackings.arrived_at as tracking_arrived_at',
                'trackings.departed_at as tracking_departed_at',
                'trackings.stop_id as tracking_id'
            )
            ->get();

        return response()->json([
            'invoices' => $invoices
        ]);
    }

    public function trackInvoiceSingle(Request $request)
    {

        // Validate the request data
        $validated = $request->validate([
            'single_invoice' => 'required',
            'single_invoice_id' => 'required',
            'stopidSingle' => 'required|integer',
            'departed_at_single' => 'nullable|date',
            'arrived_at_single' => 'nullable|date',
        ]);


        // $invoice = Invoice::where('date', [$validated['fromDateModule'], $validated['toDateModule']])->get();



            $tracking = Tracking::where('invoice_id', $validated['single_invoice'])->value('id');

            if ($tracking) {
                $newData = ['stop_id' => $validated['stopidSingle']];

                // Add 'departed_at' and 'arrived_at' only if they're not null
                if (!is_null($validated['departed_at_single'])) {
                    $newData['departed_at'] = $validated['departed_at_single'];

                }
                if (!is_null($validated['arrived_at_single'])) {
                    $newData['arrived_at'] = $validated['arrived_at_single'];

                }
              Tracking::where('id', $tracking)->update($newData);

            } else {
                // Check if both 'departed_at' and 'arrived_at' are null
                if (is_null($validated['departed_at_single']) && is_null($validated['arrived_at_single'])) {
                    return response()->json(['message' => '1']);
                }

                // Create a new record
                Tracking::create([
                    'invoice_id' => $validated['single_invoice'],
                    'tracking_id' => $validated['single_invoice_id'],
                    'stop_id' => $validated['stopidSingle'],
                    'departed_at' => $validated['departed_at_single'],
                    'arrived_at' => $validated['arrived_at_single'],
                ]);
            }

        return response()->json(['message' => '2']);
    }


    public function trackInvoice(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'fromDateModule' => 'required|date',
            'toDateModule' => 'required|date',
            'send_country' => 'required',
            'recieve_country' => 'required',
            'stopid' => 'required|integer',
            'departed_at' => 'nullable|date',
            'arrived_at' => 'nullable|date',
        ]);
        $from_country = $request->send_country;
        $to_country = $request->recieve_country;

        // $invoices = Invoice::whereBetween('date', [$validated['fromDateModule'], $validated['toDateModule']])->get();
        $invoices = Invoice::leftJoin('trackings', 'trackings.invoice_id', '=', 'invoices.id')
        ->leftJoin('customers as sender', 'invoices.sender_id', '=', 'sender.id')
        ->leftJoin('customers as receiver', 'invoices.receiver_id', '=', 'receiver.id')
        ->whereBetween('invoices.date', [$validated['fromDateModule'], $validated['toDateModule']])
        ->when($from_country, function ($query, $from_country) {
            return $query->where('sender.country', $from_country);
        })
        ->when($to_country, function ($query, $to_country) {
            return $query->where('receiver.country', $to_country);
        })
        ->select(
            'invoices.id as id',
            'invoices.invoice_id as invoice_id',
            'trackings.id as tracking_id',
            'sender.firstname as sender_first_name',
            'sender.lastname as sender_last_name',
            'sender.address as sender_address',
            'sender.country as sender_country',
            'receiver.country as receiver_country',
            'invoices.date as invoice_date',
            'invoices.total_fee as invoice_amount',
            'trackings.arrived_at as tracking_arrived_at',
            'trackings.departed_at as tracking_departed_at',
            'trackings.stop_id as tracking_id'
        )
        ->get();

        foreach ($invoices as $invoice) {
            $tracking = Tracking::where('invoice_id', $invoice->id)->value('id');
            if ($tracking) {
                $newData = ['stop_id' => $validated['stopid']];

                // Add 'departed_at' and 'arrived_at' only if they're not null
                if (!is_null($validated['departed_at'])) {
                    $newData['departed_at'] = $validated['departed_at'];
                }
                if (!is_null($validated['arrived_at'])) {
                    $newData['arrived_at'] = $validated['arrived_at'];
                }

                Tracking::where('id', $tracking)->update($newData);
            } else {
                // Check if both 'departed_at' and 'arrived_at' are null
                if (is_null($validated['departed_at']) && is_null($validated['arrived_at'])) {
                    return response()->json(['message' => '1']);
                }

                // Create a new record
                Tracking::create([
                    'invoice_id' => $invoice->id,
                    'tracking_id' => $invoice->invoice_id,
                    'stop_id' => $validated['stopid'],
                    'departed_at' => $validated['departed_at'],
                    'arrived_at' => $validated['arrived_at'],
                ]);
            }
        }
        return response()->json(['message' => '2']);
    }

    public function getTrackingDetails($invoiceId)
    {
        $invoice = Invoice::with(['sender', 'receiver', 'items', 'tracking'])->find($invoiceId);
        return response()->json($invoice);
    }

    public function tracking_invoice(Request $request)
    {
        $validated = $request->validate([
            'invoice_number' => 'required',
        ]);

        $tracking = Tracking::where('tracking_id', $validated['invoice_number'])->first();
        return response()->json($tracking);
    }
}
