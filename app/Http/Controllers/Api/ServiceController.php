<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BookServiceRequest;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    // Method to list services
    public function index()
    {
        // Retrieve all services from the database
        $services = Service::all();

        // Return a JSON response with the services
        return response()->json($services);
    }

    // Method to create a new service
    public function store(Request $request)
    {
        // Validate the request data for a new service
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            // Add other service-related fields and rules here
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create a new service record in the database
        $service = Service::create($validator->validated());

        // Return a JSON response indicating success
        return response()->json(['message' => 'Service created successfully', 'service' => $service], 201);
    }

    // Method to create a booking for a service
    public function book(BookServiceRequest $request)
    {
        // Since we're using a form request, we're assured that the data is valid at this point.
        $booking = Booking::create($request->validated());

        // Check if the booking was successfully created.
        if ($booking) {
            // Return a JSON response indicating success and include the booking data.
            return response()->json([
                'message' => 'Service booked successfully',
                'booking' => $booking
            ], Response::HTTP_CREATED); // 201 status code for resource created.
        }

        // In case the booking wasn't created, return a server error response.
        return response()->json([
            'message' => 'Failed to book the service'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 status code for server error.
    }

    // Method to search for services
    public function search(Request $request)
    {
        // Start with a basic query
        $query = Service::query();

        // Search for services by name or description
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        }

        // Filter by duration
        if ($request->has('duration')) {
            $query->where('duration', $request->input('duration'));
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->input('min_price'), $request->input('max_price')]);
        }

        // Sorting
        if ($request->has('sort_by')) {
            $sortDirection = $request->input('sort_direction', 'asc');
            $query->orderBy($request->input('sort_by'), $sortDirection);
        }

        // Pagination
        $services = $query->paginate(10);

        return response()->json($services);
    }

    // Additional methods can be added here as needed.
}
