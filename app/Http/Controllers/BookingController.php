<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
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



        if ($customer->status==1) {
            return response()->json(['message' => 'Booking cannot be deleted because order is approved.']);
        } else {
            $customer->delete();
            return response()->json(['message' => 'Booking deleted successfully']);
        }
    }
}
