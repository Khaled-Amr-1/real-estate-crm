<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ActivityController extends Controller
{
    public function store(Request $request, Lead $lead)
    {
        Gate::authorize('update', $lead);

        $validated = $request->validate([
            'type' => 'required|in:call,whatsapp,email',
            'notes' => 'nullable|string',
        ]);

        $activity = $lead->activities()->create([
            'user_id' => $request->user()->id, 
            'type' => $validated['type'],
            'notes' => $validated['notes'] ?? null,
        ]);

        return response()->json([
            'message' => 'Activity added successfully',
            'activity' => $activity
        ], 201); 
    }
}