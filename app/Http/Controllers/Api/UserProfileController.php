<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    /**
     * Get the authenticated User's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(Request $request)
    {
        return response()->json(new UserResource($request->user()));
    }

    /**
     * Update the authenticated User's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        // Validation rules
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'sometimes|min:6',
            'phone' => 'required|digits:9',
            'country_code' => 'required'
            // Add other fields as needed
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Update profile
        $user->update($validator->validated());

        // If password is provided, hash and update it
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return response()->json(['message' => 'Profile updated successfully', 'user' => $user]);
    }

    // Add other methods as necessary, like changePassword, deleteUser, etc.

    public function getSettings()
    {
        try {
            $user = auth('sanctum')->user();
            $notifications =  $user->notifications;
            $privacy = $user->privacy;
            return response()->json([
                'notifications' => [
                    'sms' => $notifications->sms,
                    'email' => $notifications->email
                ],
                'privacy' => [
                    'profile_visibility' => $user->privacy->profile_visibility,
                    'last_seen' => $user->privacy->last_seen
                ]
            ], Response::HTTP_OK);
        } catch (\Exception) {
            return response()->json([
                'message' => 'Something went wrong'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function updateSettings(Request $request)
    {
        try {

            $validator = Validator::make([
                'notifications' => $request->notifications,
                'privacy' => $request->privacy
            ], [
                'notifications' => 'required|array',
                'privacy' => 'required|array'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }

            $user = auth('sanctum')->user();
            $notifications =  $request->notifications;
            $privacy = $request->privacy;
            $notifications = [
                'sms' => $notifications['sms'],
                'email' => $notifications['email']
            ];
            $privacy = [
                'profile_visibility' => $privacy['profile_visibility'],
                'last_seen' => $privacy['last_seen']
            ];

            $user->update([
                'notifications' => $notifications,
                'privacy' => $privacy
            ]);

            $notifications =  $user->notifications;
            $privacy = $user->privacy;

            return response()->json([
                'message' => 'Setting updated successfully',
                'notifications' => [
                    'sms' => $notifications->sms,
                    'email' => $notifications->email
                ],
                'privacy' => [
                    'profile_visibility' => $user->privacy->profile_visibility,
                    'last_seen' => $user->privacy->last_seen
                ]
            ], Response::HTTP_CREATED);
        } catch (\Exception) {
            return response()->json([
                'message' => 'Something went wrong'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}