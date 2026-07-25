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
}