<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class RegisterController extends Controller
{
    private $staticOtp = '0000';

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'country_code' => 'required|string',
            'phone' => 'required|string|unique:users,phone',
            'email' => 'required|email|unique:users,email'
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'country_code' => $validatedData['country_code'],
            // Set a static OTP for now. In production, generate a unique OTP.
            'otp' => '0000',
        ]);

        if ($user) {
            // sendOtp($user->phone, generateRandomString('5'));
            return response()->json([
                'message' => 'Please verify your OTP',
                'otp' => $user->otp, // This should not be returned in production!
            ]);
        }

        return response()->json(['error' => 'Error Please try Again'], Response::HTTP_NOT_FOUND);
    }



    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required',
            'phone' => 'required',
        ]);

        // Verify the OTP. You would look up the OTP associated with the phone number here
        if ($request->otp === $this->staticOtp) {
            // Find the user by phone number
            $user = User::where('phone', $request->phone)->firstOrFail();

            // Authenticate the user session or create a token, depending on your auth setup

            return response()->json([
                'message' => 'User registered and logged in successfully.'
            ]);
        }

        return response()->json([
            'message' => 'Invalid OTP.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}