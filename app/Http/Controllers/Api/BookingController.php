<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the user's bookings.
     */
    public function index()
    {
        $userBookings = Booking::where('user_id', Auth::id())->get();
        return response()->json($userBookings);
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param StoreBookingRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookingRequest $request)
    {
        $booking = new Booking($request->validated());
        $booking->user_id = Auth::id();

        if ($booking->save()) {
            return response()->json([
                'message' => 'Booking successfully created',
                'booking' => $booking
            ], 201);
        }

        return response()->json([
            'message' => 'Failed to create booking'
        ], 500);
    }

    /**
     * Update the specified booking in storage.
     *
     * @param UpdateBookingRequest $request
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        // Authorization check can also be done via policy
        if ($booking->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $booking->fill($request->validated());

        if ($booking->save()) {
            return response()->json([
                'message' => 'Booking successfully updated',
                'booking' => $booking
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to update booking'
        ], 500);
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        if ($booking->delete()) {
            return response()->json([
                'message' => 'Booking successfully canceled'
            ], 200);
        }

        return response()->json([
            'message' => 'Failed to cancel booking'
        ], 500);
    }

    // Add more methods as needed
}
