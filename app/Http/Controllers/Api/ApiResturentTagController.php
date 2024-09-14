<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResturentTagCollection;
use App\Models\ResturentTag;
use Illuminate\Http\Request;

class ApiResturentTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ResturentTagCollection(ResturentTag::all());
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
}
