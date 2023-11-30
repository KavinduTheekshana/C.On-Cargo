<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('user_id', Auth::id())->get();
        return view('backend.customers.customers', compact('customers'));
    }

    public function getDetails($id) {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['email'],
            'contact' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'country' => ['required'],
        ]);
        $customer = new Customer();
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->contact = $request->input('contact');
        $customer->address = $request->input('address');
        $customer->postcode = $request->input('postcode');
        $customer->country = $request->input('country');
        $customer->user_id = Auth::id();
        $customer->save();
        return redirect()->back()->with('status', 'New Customer Added Sucessfully');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'customer_firstname' => 'required|max:255',
            'customer_lastname' => 'required|max:255',
            'customer_email' => 'required|email',
            'customer_contact' => 'required',
            'customer_address' => 'required',
            'customer_postcode' => 'required',
            'customer_country' => 'required',
        ]);

        // Assuming you have a Customer model and the customer ID is passed as a hidden field
        $customer = Customer::find($request->input('customer_id'));
        if (!$customer) {
            // Handle the case where the customer is not found
            return redirect()->back()->withErrors(['msg' => 'Customer not found.']);
        }

        $customer->firstname = $validatedData['customer_firstname'];
        $customer->lastname = $validatedData['customer_lastname'];
        $customer->email = $validatedData['customer_email'];
        $customer->contact = $validatedData['customer_contact'];
        $customer->address = $validatedData['customer_address'];
        $customer->postcode = $validatedData['customer_postcode'];
        $customer->country = $validatedData['customer_country'];

        $customer->save();

        // Redirect to a specified route after successful update
        return redirect()->back()->with('status', 'Customer updated successfully.');
    }

    public function saveaddress(Request $request)
    {
        $this->validate($request, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['email'],
            'contact' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'country' => ['required'],
        ]);
        $customer = new Customer();
        $customer->firstname = $request->input('firstname');
        $customer->lastname = $request->input('lastname');
        $customer->email = $request->input('email');
        $customer->contact = $request->input('contact');
        $customer->address = $request->input('address');
        $customer->postcode = $request->input('postcode');
        $customer->country = $request->input('country');
        $customer->user_id = Auth::id();
        $customer->save();
        return response()->json(['success' => true]);
    }


    public function active($id)
    {
        $customer = Customer::find($id);
        $customer->status = '1';
        $customer->save();
        return redirect()->back()->with('status', 'Customer Activated Sucessfully');
    }
    public function diactive($id)
    {
        $customer = Customer::find($id);
        $customer->status = '0';
        $customer->save();
        return redirect()->back()->with('status', 'Customer Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $customer = Customer::findOrFail($id);

        $invoicesExist = Invoice::where(function ($query) use ($customer) {
            $query->where('sender_id', $customer->id)
                ->orWhere('receiver_id', $customer->id);
        })->exists();

        if ($invoicesExist) {
            return response()->json(['message' => 'Customer cannot be deleted because there are associated invoices.']);
        } else {
            $customer->delete();
            return response()->json(['message' => 'Customer deleted successfully']);
        }
    }
    public function getCustomerInvoices($customer_id)
    {
        $invoices = Invoice::with(['sender', 'receiver'])
        ->where('customer_id', $customer_id)
        ->get();
    //   dd($invoices);
      return view('backend.customers.invoice_details', compact('invoices'))->render();
    }
}
