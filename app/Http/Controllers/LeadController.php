<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LeadController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        if ($user->isAdmin()) {
            $leads = Lead::with('assignedTo')->get();
        } else {
            $leads = $user->leads()->get();
        }

        return response()->json($leads);
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        Gate::authorize('update', $lead);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,interested,closed_won',
        ]);

        $lead->status = $validated['status'];
        $lead->save();

        return response()->json([
            'message' => 'Status updated successfully',
            'lead' => $lead,
        ]);
    }

    public function store(Request $request)
    {
        if (Lead::query()->where('phone', $request->phone)->exists()) {
            return response()->json([
                'message' => 'Lead already exists with this phone number.'
            ], 409);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'source' => 'nullable|string|max:100',
        ]);

        $lead = Lead::create($validated);
        
        return response()->json([
            'message' => 'Lead created successfully',
            'lead' => $lead
        ], 201);
    }

    public function show(Request $request, Lead $lead)
    {

        Gate::authorize('view', $lead);

        $lead->load(['activities' => function ($query) {
            $query->join('users', 'activites.user_id', '=', 'users.id')
                  ->select('activites.*', 'users.name as created_by_name')
                  ->orderBy('activites.created_at', 'desc'); 
        }]);

        return response()->json($lead);
    }
}