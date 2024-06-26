<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Static OTP for the sake of this example
    private $staticOtp = '0000';

    /**
     * Handle OTP login initiation.
     *
     * TODO: Implement actual OTP generation and sending mechanism.
     */
    public function initiateLogin(Request $request)
    {
        $validator = Validator::make([
            'phone' => ltrim($request->phone,'\0')
        ], [
            'phone' => 'required|exists:users,phone',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('phone',ltrim($request->phone,'\0'))->first();
        if ($user) {
            sendOtp($user->phone, generateRandomString('5'));
            return response()->json(data: [
                'message' => 'OTP sent successfully.',
                'otp' => $this->staticOtp, // Remove this line in production
            ], status: 201);

        }
        return response()->json(['error' => 'Error Please try Again'], Response::HTTP_NOT_FOUND);
    }

    /**
     * Handle OTP verification.
     *
     * TODO: Implement actual OTP verification mechanism.
     */
    public function verifyOtp(Request $request)
    {
        // Validate input
        $validator = Validator::make([
            'otp' => $request->otp,
            'phone' => ltrim($request->phone,'\\0')
        ], [
            'otp' => 'required|exists:users,otp',
            'phone' => 'required|exists:users,phone',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // $user = User::whereNotNull('otp')->where('phone',ltrim($request->phone,'\\0'))->where('otp',$request->otp)->first();
        $user = User::first();

        // Here we should verify the OTP sent by the user
        if ($request->otp === $this->staticOtp ?? $user->otp) {
            // TODO: Authenticate the user session
            $token = $user->createToken('token-name')->plainTextToken;
            $user->update([
                'otp' => null
            ]);
            return response()->json([
                'message' => 'Logged in successfully.',
                'token' => $token
            ]);
        }

        return response()->json([
            'message' => 'Invalid OTP.'
        ], Response::HTTP_UNAUTHORIZED);
    }
}
