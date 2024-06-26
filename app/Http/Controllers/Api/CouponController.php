<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    /**
     * Apply a coupon code to the current user's session.
     */
    public function apply(Request $request)
    {
        // Validate the incoming request
        $request->validate(['code' => 'required|string']);

        try {
            // Attempt to retrieve the coupon
            $coupon = Coupon::where('code', $request->code)
                            ->where('expires_at', '>=', now())
                            ->first();

            if (!$coupon) {
                // Log the failed attempt
                Log::info('Coupon application attempt failed for user: ' . auth('sanctum')->id(), ['code' => $request->code]);

                return response()->json(['message' => 'Invalid or expired coupon code.'], 404);
            }

            // Check if the coupon has been used by this user
            if ($coupon->users->contains(auth('sanctum')->id())) {
                return response()->json(['message' => 'This coupon has already been used.'], 400);
            }

            // Attach the coupon to the user if it's single use
            if ($coupon->single_use) {
                $coupon->users()->attach(auth('sanctum')->id());
            }

            // Log the successful coupon application
            Log::info('Coupon applied successfully for user: ' . auth('sanctum')->id(), ['code' => $request->code]);
            
            // Respond with the details of the applied coupon
            return response()->json([
                'message' => 'Coupon applied successfully.',
                'discount' => $coupon->discount_amount,
                'is_percentage' => $coupon->discount_percentage
            ], 200);

        } catch (\Exception $e) {
            // Log the exception
            Log::error('Coupon application error: ' . $e->getMessage());

            // Return a generic error message
            return response()->json(['message' => 'An error occurred while applying the coupon.'], 500);
        }
    }
}
