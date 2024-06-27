<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FoodTag;
use App\Models\ResturentTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashbord');
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
    public function edit()
    {
        $admin = Admin::find(1);
        return view('admin.change_password', ['admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $admin = Admin::find(1);
        $admin->update($formFields);

        return redirect('/admin')->with('message', 'username & password updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Show admin login form
    public function login()
    {
        return view('admin.login');
    }

    // Log in admin
    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/admin')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['username' => 'invalid credentials'])->onlyInput('username');
    }

    // Logout admin
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/admin/login')->with('message', 'You have been logged out!');
    }

    // Show resturents tag page view
    public function resturentsTagsIndex()
    {
        return view('admin.resturents_tags', ['tags' => ResturentTag::all()]);
    }

    // Create resturent tag and store in database
    public function resturentsTagsStore(Request $request, ResturentTag $resturentTag)
    {
        $formFields = $request->validate([
            'tag' => 'required',
        ]);

        $resturentTag->create($formFields);

        return back()->with('message', 'Tag created successfully!');
    }

    // Delete resturents tag
    public function deleteResTag(ResturentTag $resturentTag)
    {
        // make sure user is auth!   

        $resturentTag->delete();
        return redirect('/admin/resturents_tags')->with('delMessage', 'tag deleted!');

    }

    // Show food tag page view
    public function foodTagsIndex()
    {
        return view('admin.food_tags', ['tags' => FoodTag::all()]);
    }

    // Create food tag and store in database
    public function foodTagsStore(Request $request, FoodTag $foodTag)
    {
        $formFields = $request->validate([
            'tag' => 'required',
        ]);

        $foodTag->create($formFields);

        return back()->with('message', 'Tag created successfully!');
    }

    // Delete food tag
    public function deleteFoodTag(FoodTag $foodTag)
    {
        // make sure user is auth!   

        $foodTag->delete();
        return redirect('/admin/food_tags')->with('delMessage', 'tag deleted!');
    }

}
