<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Citation;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class CitationController extends Controller
{


    public function violationbilling(Request $request, $client_id)
{
    // Retrieve the client data based on the provided client ID
    $client = Client::find($client_id);

    if (!$client) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Fetch the citations for the client
    $BillandViolations = Citation::with('violation', 'stallNumber', 'stallType')
        ->where('client_id', $client_id)
        ->get();

    // Fetch all clients (if needed) - replace with your actual query
    $clients = Client::all();

    // Fetch stallTypes (replace with your query to fetch stallTypes)
    $stallTypes = StallTypes::all();

    // Fetch stallNumbers (replace with your query to fetch stallNumbers)
    $stallNumbers = StallNumber::where('status', 'occupied')->get();

    // Pass the client, citations, clients, stallTypes, and stallNumbers data to the view
    return view('client_info.violationbilling', compact('BillandViolations', 'client', 'clients', 'stallTypes', 'stallNumbers'));
}
    public function addViolationForm($client_id)
    {
        // Retrieve the client data based on the provided client ID
        $client = Client::find($client_id);

        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Fetch stallTypes (replace with your query to fetch stallTypes)
        $stallTypes = StallTypes::all();

        return view('client_info.addviolation', compact('client', 'stallTypes'));
    }

    public function getStallNumbersByStallType(Request $request)
    {
        $selectedStallType = $request->input('stalltype_id');
        $client_id = $request->input('client_id');
    
        // Fetch stall numbers based on the selected stall type and the client
        $stallNumbers = StallNumber::where('stall_type_id', $selectedStallType)
            ->where('status', 'occupied')
            ->where('client_id', $client_id)
            ->get();
    
        return response()->json(['stallNumbers' => $stallNumbers]);
    }

    public function storeViolation(Request $request, $client_id)
    {
        // Validate the form data
        $request->validate([
            'stalltype_id' => 'required',
            'stall_number_id' => 'required',
            'violation_id' => 'required',
            'start_date' => 'required|date',
        ]);

        // Create a new Citation record
        Citation::create([
            'client_id' => $client_id, 
            'stalltype_id' => $request->input('stalltype_id'),
            'stall_number_id' => $request->input('stall_number_id'),
            'violation_id' => $request->input('violation_id'),
            'start_date' => $request->input('start_date'),
        ]);

        // Redirect back with a success message or do any other necessary actions
        return redirect()->back()->with('success', 'Violation added successfully');
    }


}
