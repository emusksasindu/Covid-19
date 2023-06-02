<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Help;

class HelpController extends Controller
{
    /**
     * Save a help record.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Create and save the help record
        $help = Help::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        // Return a response indicating success
        return response()->json(['message' => 'Help record created successfully', 'data' => $help], 201);
    }

    /**
     * Get all help records.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all help records
        $helps = Help::all();

        // Return the help records as a response
        return response()->json(['data' => $helps], 200);
    }
    
    /**
     * Update a help record.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Find the help record by ID
        $help = Help::find($id);

        // Return an error response if the help record is not found
        if (!$help) {
            return response()->json(['message' => 'Help record not found'], 404);
        }

        // Update the help record
        $help->title = $request->input('title');
        $help->description = $request->input('description');
        $help->save();

        // Return a response indicating success
        return response()->json(['message' => 'Help record updated successfully', 'data' => $help], 200);
    }
    
    /**
     * Delete a help record.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the help record by ID
        $help = Help::find($id);

        // Return an error response if the help record is not found
        if (!$help) {
            return response()->json(['message' => 'Help record not found'], 404);
        }

        // Delete the help record
        $help->delete();

        // Return a response indicating success
        return response()->json(['message' => 'Help record deleted successfully'], 200);
    }
}
