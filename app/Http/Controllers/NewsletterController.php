<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('backend.submitions.newsletters', compact('newsletters'));
    }

    public function downloadEmailList()
    {
        $emails = Newsletter::pluck('email')->toArray();

        $fileContents = implode("\r\n", $emails);
        $fileName = 'email_list.txt';

        return response($fileContents)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'email' => 'required|email|unique:newsletters',
            ]);

            // Create a new newsletter subscriber
            Newsletter::create([
                'email' => $request->email,
            ]);

            return response()->json(['message' => 'Subscription successful']);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['message' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
