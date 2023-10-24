<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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


}
