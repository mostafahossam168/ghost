<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreReviewRequest; // Ensure this request file exists for validation
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in the database.
     *
     * @param  \App\Http\Requests\StoreReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReviewRequest $request)
    {
        $review = new Review();
        $review->user_id = auth('sanctum')->id(); // Assuming you're using Laravel's Auth for user identification
        $review->service_id = $request->service_id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;

        if ($review->save()) {
            return response()->json(['message' => 'Review successfully created', 'review' => $review], 201);
        } else {
            return response()->json(['message' => 'Failed to create review'], 500);
        }
    }

    /**
     * Display a listing of reviews for a specific service.
     *
     * @param  int  $serviceId
     * @return \Illuminate\Http\Response
     */
    public function index($serviceId)
    {
        $reviews = Review::where('service_id', $serviceId)->get();
        return response()->json($reviews);
    }

    // Additional methods like update or delete can be added here if needed

    public function destroy($id)
    {
        Review::destroy($id);
        return response()->json([
            'message' => 'review deleted successfully'
        ]);
    }

}
