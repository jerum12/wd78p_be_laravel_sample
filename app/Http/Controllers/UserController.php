<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        // $users2 = DB::select("SELECT * from users");
        // $users3 = DB::table("users")->get();
        
        return response()->json(['message' => 'Get ALL', 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response()->json(['message' => 'SAVED USING POST']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response()->json(['message' => 'GET BY ID'.$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return response()->json(['message' => "UPDATE BY PUT".$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return response()->json(['message' => "Delete"]);
    }
}
