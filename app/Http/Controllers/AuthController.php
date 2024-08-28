<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'Username or email is required',
            'password.required' => 'Password is required',
        ]);

        // Attempt to find the user by case-sensitive username or email
        $user = User::whereRaw('BINARY `name` = ?', [$request->name])
                    ->orWhereRaw('BINARY `email` = ?', [$request->name])
                    ->first();

        // Check if user exists and verify password
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication successful
            session()->put('user', $user);
            return redirect()->route('dashboard');
        }

        // Authentication failed
        return redirect()->back()->withErrors(['message' => 'Invalid credentials']);

    }

    public function logout()
    {
        auth()->logout();
        session()->forget('user');
        return redirect()->route('welcome');
    }
}
