<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Settings::first();
        return view('backend.settings.settings', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'sltouk1kg' => 'required',
            'sltouk2kg' => 'required',
            'sltouk3kg' => 'required',
            'sltouk4kg' => 'required',
            'sltouk5kg' => 'required',
            'uktosl1kg' => 'required',
            'uktosl2kg' => 'required',
            'uktosl3kg' => 'required',
            'uktosl4kg' => 'required',
            'uktosl5kg' => 'required',
            'sltoukpkg' => 'required',
            'uktoslpkgpersonal' => 'required',
            'uktoslpkgcommercial' => 'required',
            'sltoukdeandcolless12' => 'required',
            'sltoukdeandcolmore12' => 'required',
            'uktosldeandcolless20wp' => 'required',
            'uktosldeandcolmore20wp' => 'required',
            'uktosldeandcolless20owp' => 'required',
            'uktosldeandcolmore20owp' => 'required',

        ]);

        $setting = Settings::find('1');

        if (!$setting) {
            return redirect()->back()->with('error', 'Settings not found.');
        }

        // Update all fields with the values from the form
        $setting->update($request->all());

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
