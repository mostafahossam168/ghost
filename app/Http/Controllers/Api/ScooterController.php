<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Scooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScooterController extends Controller
{
    public function index(Request $request)
    {
        $scooter = Scooter::where('user_id', auth()->user()->id)->with('scooterDeviceInfo', 'batteryStatus', 'controlInfo', 'gpsData')->first();
        return response()->json(['status' => 200, 'data' => $scooter]);
    }

    public function refresh(Request $request)
    {
        $scooter = Scooter::where('user_id', auth()->user()->id)->with('controlInfo')->first();
        return response()->json(['status' => 200, 'data' => $scooter]);
    }

    public function ControlScooterRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'electronic_lock' => "required|in:LOCK_STATUS_LOCK,LOCK_STATUS_UNLOCK,LOCK_STATUS_CHECKING else",
            'front_lights_control' => "required|boolean",
            'cable_lock_control' => "required|in:LOCK_STATUS_LOCK,LOCK_STATUS_UNLOCK,LOCK_STATUS_CHECKING else",
            'battery_lock_control' => "required|in:LOCK_STATUS_LOCK,LOCK_STATUS_UNLOCK,LOCK_STATUS_CHECKING else",
            'tail_light_control' => "required|boolean",
            'electronic_fence' => "required|boolean",
            'find_car_response_time' => "nullable",
            'unlocked_state_upload_interval' => "nullable",
            'locked_state_upload_interval' => "nullable",
            'speed_mode' => "required|in:SPEED_MODE_1,SPEED_MODE_2,SPEED_MODE_3 else",
            'speed_limit_mode_1' => "nullable",
            'speed_limit_mode_2' => "nullable",
            'speed_limit_mode_3' => "nullable",
            'cruise_control' => "required|boolean",
            'starting_mode' => "required|boolean",
            'speed_button_switch' => "required|boolean",
            'led_button' => "required|boolean",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        $scooter = Scooter::where('user_id', auth()->user()->id)->first();
        $scooter->controlInfo()->update($validator->validated());
        return response()->json(['message' => "success Update controll Info", 'scooterInfo' => $scooter->controlInfo]);
    }
}