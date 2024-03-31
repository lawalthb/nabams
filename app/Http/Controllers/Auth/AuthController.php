<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function dashboard()
    {
        return redirect("https://www.google.com/");
    }


    public function register(Request $request)
    {
        // id	firstname	lastname	nickname	email	password	matno	phone	level	member_type	expectation_msg	reg_amount
        // Validation
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'phone' => 'nullable|string|max:11',
            'matno' => 'nullable|string|max:20',
            'level' => 'required|string|max:50',
            'member_type' => 'required|string|max:50',
            'expectation_msg' => 'nullable|string|max:200',
            'email' => 'required|string|email|unique:users|max:60',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create and save the user
        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'phone' => $validatedData['phone'],
            'matno' => $validatedData['matno'],
            'level' => $validatedData['level'],
            'member_type' => $validatedData['member_type'],
            'expectation_msg' => $validatedData['expectation_msg'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        // Optionally, you can log in the user after registration
        //  Auth::login($user);
        //   dd('goto payment gateway');
        return redirect('/dashboard');
    }

    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
