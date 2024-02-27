<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getDashboardData()
    {
        
        try {
            $totalAssets = DB::table('assets')->count();
            $totalStaff = DB::table('users')->count();
            $totalAmount = DB::table('assets')->sum('purchase_cost');

            return response()->json([
                'totalAssets' => $totalAssets,
                'totalStaff' => $totalStaff,
                'totalAmount' => $totalAmount,
            ]);
        } catch (\Exception $e) {
            Log::error('Error in getDashboardData: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred.'], 500); // Return an error response
        }
    }
    
}

