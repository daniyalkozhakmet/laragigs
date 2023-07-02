<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function registerShow()
    {
        return view('register');
    }
    public function loginShow()
    {
        return view('login');
    }
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
        $validated = $validator->validated();
        // Hash Password
        $validated['password'] = bcrypt($validated['password']);

        // Create User
        $user = User::create($validated);

        // Login
        auth()->login($user);

        return redirect('gigs')->with('message', 'User created and logged in');
    }
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();
        if (auth()->attempt($validated)) {
            $request->session()->regenerate();

            return redirect('gigs')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
