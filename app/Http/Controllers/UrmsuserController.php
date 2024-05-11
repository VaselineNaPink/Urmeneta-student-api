<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urmsuser;

class UrmsuserController extends Controller
{
    public function index(Request $request)
    {
        $query = Urmsuser::query();

        // Filtering based on specified fields
        if ($request->filled('age')) {
            $query->where('age', $request->age);
        }

        // Search functionality
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('firstname', 'like', "%$searchTerm%")
                      ->orWhere('lastname', 'like', "%$searchTerm%")
                      ->orWhere('nickname', 'like', "%$searchTerm%");
            });
        }

        // Sorting
        if ($request->filled('sort') && $request->filled('order')) {
            $sortField = $request->sort;
            $sortOrder = $request->order;
            $query->orderBy($sortField, $sortOrder);
        }

        // Limiting results
        if ($request->filled('limit')) {
            $limit = $request->limit;
            $query->limit($limit);
        }

        // Execute the query and return the results
        $Urmsusers = $query->get();

        return response()->json($Urmsusers);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'age' => 'required|integer',
            'nickname' => 'nullable|string',
        ]);
    
        
        $Urmsuser = Urmsuser::create($request->all());
    
        return response()->json($Urmsuser, 201);
    }
    
    
    public function show($id)
    {
        $Urmsuser = Urmsuser::findOrFail($id);
        return response()->json($Urmsuser);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|integer',
            'nickname' => 'nullable|string',
        ]);
    

        $Urmsuser = Urmsuser::findOrFail($id);
    
        $Urmsuser->update($request->all());
    
        return response()->json($Urmsuser);
    }
    
    
    public function destroy($id)
    {
        $Urmsuser = Urmsuser::findOrFail($id);
        $Urmsuser->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}
