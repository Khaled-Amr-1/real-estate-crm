<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{

    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('role')) {
            $query->where('role', $request->role);
        }

        $columns = ['id', 'name'];
        $users = $query->select($columns)->get();

        return response()->json($users);
    }

    public function assignLead(Request $request, Lead $lead)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $lead->assigned_to = $request->user_id;
        $lead->save();

        return response()->json([
            'message' => 'assigned succesfuly',
            'lead' => $lead
        ]);
    }
}
