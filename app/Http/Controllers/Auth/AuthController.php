<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return ValidationException::withMessages([ 
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    public function logout(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
 
        return response()->json([
            'message' => 'User logged out successfully'
        ]);
    }
}
