<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = User::where('role', '1')->get();
        return view('backend.agents.agents', compact('agents'));
    }


    public function save(Request $request)
    {
        // Validate the request
         $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact' => 'required|string|max:255',
            'identity' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);
        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->contact,
            'identity' => $request->identity,
            'location' => $request->location,
            'role' => 1,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('status', 'New Agent Added Sucessfully');
    }
    public function profile($id)
    {
        $user = User::find($id);
        return view('backend.agents.profile', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        // Validate the input
        $request->validate([
            'user_id' => 'required', // Add validation for user_id if needed
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the user
        $user = User::findOrFail($request->user_id);



        // Update the password
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }


    public function active($id)
    {
        $user = User::find($id);
        $user->status = '1';
        $user->save();
        return redirect()->back()->with('status', 'Agent Activated Sucessfully');
    }
    public function diactive($id)
    {
        $user = User::find($id);
        $user->status = '0';
        $user->save();
        return redirect()->back()->with('status', 'Agent Diactivated Sucessfully');
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'Agent deleted successfully']);
    }
}
