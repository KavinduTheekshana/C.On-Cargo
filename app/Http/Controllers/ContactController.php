<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.submitions.contact', compact('contacts'));
    }


    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'subject' => 'required',
                'message' => 'required',
            ]);

            // Create a new newsletter subscriber
            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            return response()->json(['message' => 'Your Form Submittion successful']);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['message' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function active($id)
    {
        $customer = Contact::find($id);
        $customer->status = '1';
        $customer->save();
        return redirect()->back()->with('status', 'Contact form details mark as read Sucessfully');
    }
    public function diactive($id)
    {
        $customer = Contact::find($id);
        $customer->status = '0';
        $customer->save();
        return redirect()->back()->with('status', 'Contact form details mark as unread Sucessfully');
    }
    public function delete($id)
    {
        $customer = Contact::find($id);
        $customer->delete();
        return redirect()->back()->with('status', 'Contact form details deleted successfully');
    }
    public function getContactDetails($contactid)
    {
        $contact = Contact::find($contactid);
        return response()->json($contact);
    }

}
