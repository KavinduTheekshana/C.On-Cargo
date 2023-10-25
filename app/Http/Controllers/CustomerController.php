<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function index()
    {
        $customers = Customer::all();
        return view('backend.customers.customers', compact('customers'));
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
        $customer->save();
        return redirect()->back()->with('status', 'New Customer Added Sucessfully');
    }
    public function active($id)
    {
        $testimonials = Customer::find($id);
        $testimonials->status = '1';
        $testimonials->save();
        return redirect()->back()->with('status', 'Customer Activated Sucessfully');
    }
    public function diactive($id)
    {
        $testimonials = Customer::find($id);
        $testimonials->status = '0';
        $testimonials->save();
        return redirect()->back()->with('status', 'Customer Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $testimonials = Customer::find($id);
        $testimonials->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }

}
