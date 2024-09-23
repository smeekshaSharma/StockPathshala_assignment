<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Session::has('access_token')) {
            return redirect()->route('classes');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|digits:10',
        ]);

        $response = Http::post('https://internal.stockpathshala.in/api/v1/login-register', [
            'user_name' => $request->user_name,
            'hash_code' => '96pYMmXfHNR'
        ]);

        if ($response->successful()) {
            Session::put('user_name', $request->user_name);
            return redirect()->route('otp');
        } else {
            return back()->withErrors(['error' => 'Login failed, try again!']);
        }
    }

    public function showOtpForm()
    {
        if (!Session::has('user_name')) {
            return redirect()->route('login')->withErrors(['error' => 'Please login first.']);
        }

        return view('auth.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:4',
        ]);

        $user_name = Session::get('user_name');
        if (!$user_name) {
            return back()->withErrors(['error' => 'User name not found. Please try again.']);
        }

        $response = Http::post('https://internal.stockpathshala.in/api/v1/verify-login-register', [
            'user_name' => $user_name,
            'otp' => $request->otp,
        ]);

        logger($response->body());
        if ($response->successful()) {
            $data = $response->json();
            if (!isset($data['token'])) {
                return back()->withErrors(['error' => 'Access token not found in the response.']);
            }
            Session::put('access_token', $data['token']);
            Session::put('profile', $data);
            
            return redirect()->route('classes');
        } else {
            return back()->withErrors(['error' => 'Invalid OTP, please try again.']);
        }
    }
}
