<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index(Request $request)
    {
            $query = Unit::query()
            ->join('projects', 'units.project_id', '=', 'projects.id', 'inner', false)
            ->select(['units.*', 'projects.name as project_name']);
        if ($request->has('status')) {
            $query->where('units.status', $request->status);
        }

        $units = $query->get();

        return response()->json($units);
    }
}