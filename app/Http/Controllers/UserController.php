<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    // Show user login form
    public function login()
    {
        return view('login');
    }

    // login user
    public function auth(Request $request)
    {

        $formFields = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);

        if (auth()->attempt($formFields)) {

            if (auth()->check()) {
                return redirect('/home')->with('message', 'You are now logged in!');
            }
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');

    }

    // Show user register form
    public function register()
    {
        return view('register');
    }

    // Register user in database
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login user
        auth()->login($user);

        return redirect('/home')->with('message', 'User created & login!');
    }

    // logout user 
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message', "You have been logged out!");
    }

    // Show user settings page
    public function userSetting()
    {
        $user = auth()->user();
        return view('user_setting', ['user' => $user]);
    }


    // Update user
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string|min:8',
            'city' => 'required|string|min:2'
        ]);

        // Update user
        $userId = auth()->user()->id;
        $user = User::where('id', $userId);
        $user->update($formFields);

        // Redirect user
        return redirect('/home')->with('message', 'User info updated!');

    }

}
