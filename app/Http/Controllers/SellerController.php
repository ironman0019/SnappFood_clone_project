<?php

namespace App\Http\Controllers;

use App\Models\Resturent;
use App\Models\ResturentTag;
use App\Models\Seller;
use App\Rules\mobileNo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sellers.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('sellers', 'email')],
            'phone' => ['required', new mobileNo],
            'password' => 'required|confirmed|min:4',
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create seller account
        $seller = Seller::create($formFields);

        // Login seller
        auth()->guard('seller')->login($seller);
        $seller_id = auth()->guard('seller')->id();

        // Create resturent for this new seller
        Resturent::create([
            'seller_id' => $seller_id,
            'name' => '0',
            'tag' => '0',
            'phone' => '0',
            'address' => '0',
            'bank' => '0',
        ]);

        // redirect 
        return redirect('/seller/dashbord')->with('message', 'You are logged in!');
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

    // Show resturent complete info form
    public function createResturentInfo()
    {
        return view('sellers.resturents_info', ['tags' => ResturentTag::all()]);
    }

    // update required resturent info in database
    public function storeResturentInfo(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'tag' => 'required|not_in:0',
            'phone' => 'required',
            'address' => 'required',
            'bank' => 'required|numeric|min:24',
        ]);

        $formFields['bank'] = "IR-".$formFields['bank'];

        // Create resturent info
        $seller_id = auth()->guard('seller')->id();
        $resturent = Resturent::where('seller_id', $seller_id);
        $resturent->update($formFields);

        // redirect to dashbord page
        return redirect('/seller/dashbord')->with('message', 'Account Created and Login successfuly!');
    }

    // Show seller login page
    public function login()
    {
        return view('sellers.login');
    }

    // Authtenticate seller and login
    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

       
        if (Auth::guard('seller')->attempt($formFields)) {

            if (auth()->guard('seller')->check()) {
                return redirect('/seller/dashbord')->with('message', 'You are now logged in!');
            }
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
    }
}
