<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::all();
        return view('backend.bookings.bookings', compact('bookings'));
    }
    public function create($id)
    {
        $booking = Booking::find($id);
        $sender = Customer::find($booking->sender_id);
        $receiver = Customer::find($booking->receiver_id);
        // $customers = Customer::all();
        // $customers = Customer::where('status', 1);
        $customers = DB::table('customers')
        ->join('users', 'customers.user_id', '=', 'users.id')
        ->where('users.role', '!=', 1)
        ->whereNull('customers.deleted_at') // Add this line to filter out soft-deleted records
        ->select('customers.*')
        ->get();
        $lastInvoiceId = Invoice::max('id');
        $nextInvoiceId = $lastInvoiceId + 1;
        $nextInvoiceNumber = str_pad($nextInvoiceId, 5, '0', STR_PAD_LEFT);

        $users = User::where('role', 1)->get();
        $identities = $users->map(function ($user) {
            return ['id' => $user->id, 'identity' => $user->identity];
        });
        return view('backend.invoice.createbooking', compact('booking', 'nextInvoiceNumber', 'customers', 'sender', 'receiver', 'identities'));
    }

    public function copyCustomer($customer_id)
    {
        $originalRecord = Customer::find($customer_id);


        try {
            if ($originalRecord) {
                // Replicate the original record
                $newRecord = $originalRecord->replicate();

                // Change a specific value. Replace 'attributeName' with the actual field name
                // and 'newValue' with the new value you want to set.
                $newRecord->user_id = Auth::id();

                // Save the new record
                $newRecord->save();

                return back()->with('status', 'Customer copied successfully.');
            } else {
                return back()->with('error', 'Record not found.');
            }
        } catch (QueryException $e) {
            // Check if it's a duplicate entry error
            if ($e->getCode() == 23000) {
                return back()->with('error', 'This email is already used for this user.');
            }

            // Handle other possible errors
            return back()->with('error', 'An error occurred while creating the customer.');
        }
    }

    public function deleteadmin($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
    public function active($id)
    {
        $booking = Booking::find($id);
        $booking->status = '1';
        $booking->save();
        return redirect()->back()->with('status', 'Booking Activated Sucessfully');
    }
    public function diactive($id)
    {
        $booking = Booking::find($id);
        $booking->status = '0';
        $booking->save();
        return redirect()->back()->with('status', 'Booking Diactivated Sucessfully');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'sender' => 'required|string',
            'receiver' => 'required|string',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'contact' => 'required|string',
        ]);

        // Create a new Booking instance and set its properties from the validated data
        $booking = new Booking();
        $booking->sender_id = $validatedData['sender'];
        $booking->receiver_id = $validatedData['receiver'];
        $booking->user_id = Auth::id();
        $booking->height = $validatedData['height'];
        $booking->width = $validatedData['width'];
        $booking->length = $validatedData['length'];
        $booking->weight = $validatedData['weight'];
        $booking->contact = $validatedData['contact'];

        // Optional: Add user_id if it's a required field and you have user authentication
        // $booking->user_id = auth()->id();

        // Save the booking
        $booking->save();

        // Return a JSON response
        return response()->json(['message' => 'Booking saved successfully', 'booking_id' => $booking->id]);
    }

    public function delete($id)
    {
        $customer = Booking::findOrFail($id);



        if ($customer->status == 1) {
            return response()->json(['message' => 'Booking cannot be deleted because order is approved.']);
        } else {
            $customer->delete();
            return response()->json(['message' => 'Booking deleted successfully']);
        }
    }
}
