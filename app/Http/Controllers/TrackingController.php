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
        $invoices = Invoice::leftJoin('trackings', 'trackings.invoice_id', '=', 'invoices.id')
            ->leftJoin('customers', 'invoices.sender_id', '=', 'customers.id')
            ->whereBetween('invoices.date', [$startDate, $endDate])
            ->select(
                'invoices.id as id',
                'invoices.invoice_id as invoice_id',
                'trackings.id as tracking_id',
                'customers.firstname as sender_first_name',
                'customers.lastname as sender_last_name',
                'customers.address as sender_address',
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
    public function trackInvoice(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'fromDateModule' => 'required|date',
            'toDateModule' => 'required|date',
            'stopid' => 'required|integer',
            'departed_at' => 'nullable|date',
            'arrived_at' => 'nullable|date',
        ]);

        $invoices = Invoice::whereBetween('date', [$validated['fromDateModule'], $validated['toDateModule']])->get();

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
                    'stop_id' => $validated['stopid'],
                    'departed_at' => $validated['departed_at'],
                    'arrived_at' => $validated['arrived_at'],
                ]);
            }
        }

        return response()->json(['message' => '2']);
    }

}
