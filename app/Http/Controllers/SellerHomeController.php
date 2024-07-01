<?php

namespace App\Http\Controllers;

use App\Models\Resturent;
use App\Models\ResturentTag;
use Illuminate\Http\Request;

class SellerHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sellers.dashbord');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Show resturent setting page
    public function resturentSetting()
    {
        // Get seller resturent data
        $seller_id = auth()->guard('seller')->id();
        $resturents = Resturent::where('seller_id', $seller_id)->get();
        foreach($resturents as $resturent) {
            $resturent;
        }

        return view('sellers.resturent_setting', ['resturent' => $resturent, 'tags' => ResturentTag::all()]);
    }

    // Update resturent setting
    public function updateResturentSetting(Request $request)
    {  
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'tag' => 'required|not_in:0',
            'phone' => 'required',
            'address' => 'required',
            'delivary_price' => ['required', 'numeric'],
            'work_hours' => 'required|not_in:0',
            'work_hours2' => 'required|not_in:0',
        ]);

        $formFields['work_hours'] = $formFields['work_hours']. '-'. $formFields['work_hours2'];
        array_pop($formFields); // deleting work_hours2

        // Update resturent setting
        $seller_id = auth()->guard('seller')->id();
        $resturent = Resturent::where('seller_id', $seller_id);
        $resturent->update($formFields);

        // redirect
        return back()->with('message', 'Resturent setting updated!');
    }

    // Update resturent status
    public function updateResturentStatus(Request $request)
    {
        $formFields = $request->validate([
            'status' => 'required',
        ]);

        // Update resturent setting
        $seller_id = auth()->guard('seller')->id();
        $resturent = Resturent::where('seller_id', $seller_id);
        $resturent->update($formFields);

        // redirect
        return back()->with('message', 'Resturent status updated!');
    }
}
