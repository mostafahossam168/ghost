<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\SupportFaqsResource;
use App\Models\SupportFaqs;

class SupportFaqController extends Controller
{
    public function index()
    {
        try{
            return SupportFaqsResource::collection(SupportFaqs::get());
        }catch(\Exception $e){
            return response()->json(['message' => 'Something went wrong'],Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
