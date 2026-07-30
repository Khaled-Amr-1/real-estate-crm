<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats(Request $request)
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            return response()->json([
                'total_leads' => Lead::count(),
                'unassigned_leads' => Lead::whereNull('assigned_to')->count(),
                'won_deals' => Lead::where('status', 'closed_won')->count(),
            ]);
        }

        return response()->json([
            'my_total_leads' => Lead::where('assigned_to', $user->id)->count(),
            'my_new_leads' => Lead::where('assigned_to', $user->id)->where('status', 'new')->count(),
            'my_won_deals' => Lead::where('assigned_to', $user->id)->where('status', 'closed_won')->count(),
        ]);
    }
}