<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $userId)
    {
        //
        $address = Address::where('user_id', $userId)->get();
        return response()->json([
            'success' => true,
            'data' => $address,
            'message' => 'Addresses retrieved successfully'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $user)
    {
        //
        $address = Address::create([
            'user_id' => $user,
            'street' => $request->street,
            'barangay' => $request->barangay,
            'city' => $request->city,
            'province' => $request->province,
            'region' => $request->region,
            'zip_code' => $request->zip_code,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Address created successfully',
            'data' => $address,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $address = Address::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $address,
            'message' => 'Address retrieved successfully'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $address = Address::findOrFail($id);
        $address->update($request->only([
            'street',
            'barangay',
            'city',
            'province',
            'region',
            'zip_code',
        ]));
        return response()->json([
            'success' => true,
            'message' => 'Address updated successfully',
            'data' => $address,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $address = Address::findOrFail($id);
        $address->delete();
        return response()->json([
            'success' => true,
            'message' => 'Address deleted successfully',
        ]);
    }
}
