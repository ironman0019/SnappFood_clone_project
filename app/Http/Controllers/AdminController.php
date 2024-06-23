<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/admin/login')->with('message', 'You have been logged out!');
    }
}
