<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\JsonResponse;

class TrackingController extends Controller
{
    public function getTrackingStatus($order_id): JsonResponse
    {
        // Fetch the courier status based on the order ID
        $courier = Courier::find($order_id);
        
        // Check if courier exists
        if (!$courier) {
            return response()->json(['status' => 'not found'], 404);
        }

        // Return the status
        return response()->json(['status' => $courier->status]);
    }
}
