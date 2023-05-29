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
}
