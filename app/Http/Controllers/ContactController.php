<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $userId)
    {
        //
        $contact = Contact::where('user_id', $userId)->get();
        return response()->json([
            'success' => true,
            'data' => $contact,
            'message' => 'Contacts retrieved successfully'
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
        $contact = Contact::create([
            'user_id' => $user,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Contact created successfully',
            'data' => $contact,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, $userId)
    {
        //
        $contact = Contact::findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $contact,
            'message' => 'Contact retrieved successfully'
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
        $contact = Contact::findOrFail($id);
        $contact->update([
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'is_active' => $request->is_active,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully',
        ]);
    }
}
