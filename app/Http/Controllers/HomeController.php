<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Resturent;
use App\Models\ResturentTag;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ResturentTag::all();

        return view('index', [
            'categories' => $categories
        ]);
    }

    // Show index page when user logged in!
    public function home()
    {
        $user = auth()->user();
        $resturents = Resturent::where('city', $user->city)->paginate(10);
        $categories = ResturentTag::all();
        $foods = Food::where('food_party', 1)->get();
        $newResturents = Resturent::latest()->paginate(4);

        return view('home', [
            'resturents' => $resturents,
            'categories' => $categories,
            'foods' => $foods,
            'newResturents' => $newResturents,
        ]);
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


}
