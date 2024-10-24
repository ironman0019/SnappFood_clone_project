<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;

class ApiRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $resturent_id = $request->input('resturent_id');
        $order_id = $request->input('order_id');
        $rate = $request->input('rate');

        // Create rate for resturent
        Rate::create([
            'user_id' => $userId,
            'resturent_id' => $resturent_id,
            'order_id' => $order_id,
            'rate' => $rate
        ]);

        return response([
            'message' => 'Rate created!'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rate $Rate)
    {
        $resturent_id = $request->input('resturent_id');
        $rate = $request->input('rate');
        $order_id = $request->input('order_id');

        // Update rateing
        $Rate->update([
            'resturent_id' => $resturent_id,
            'order_id' => $order_id,
            'rate' => $rate
        ]);

        return response([
            'message' => 'Rateing Updated!'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
