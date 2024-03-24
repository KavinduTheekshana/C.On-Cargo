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
        $settings = Settings::all();
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
    public function uktoslp(Request $request)
    {
        foreach ($request->uk2slwh2whP as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->uk2slwh2whP = $request->uk2slwh2whP[$index];
                $setting->uk2sld2dwpP = $request->uk2sld2dwpP[$index];
                $setting->uk2sld2dowpP = $request->uk2sld2dowpP[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function sltoukc(Request $request)
    {
        foreach ($request->uk2slwh2whC as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->uk2slwh2whC = $request->uk2slwh2whC[$index];
                $setting->uk2sld2dwpC = $request->uk2sld2dwpC[$index];
                $setting->uk2sld2dowpC = $request->uk2sld2dowpC[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function sltofr(Request $request)
    {
        foreach ($request->sl2frd2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->sl2frd2d = $request->sl2frd2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function sltouk(Request $request)
    {
        foreach ($request->sl2ukd2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->sl2ukd2d = $request->sl2ukd2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function frtosl(Request $request)
    {
        foreach ($request->fr2sld2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->fr2sld2d = $request->fr2sld2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function sltoit(Request $request)
    {
        foreach ($request->sl2itd2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->sl2itd2d = $request->sl2itd2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function ittosl(Request $request)
    {
        foreach ($request->it2sld2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->it2sld2d = $request->it2sld2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function sltoca(Request $request)
    {
        foreach ($request->sl2cad2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->sl2cad2d = $request->sl2cad2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function catosl(Request $request)
    {
        foreach ($request->ca2sld2d as $index => $value) {
            $setting = Settings::find($index + 1); // Assuming the IDs start from 1
            if ($setting) {
                $setting->ca2sld2d = $request->ca2sld2d[$index];
                $setting->save();
            }
        }
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
