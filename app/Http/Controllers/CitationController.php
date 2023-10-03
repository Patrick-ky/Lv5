<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Citation;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class CitationController extends Controller
{


    public function violationbilling($id)
    {
        $clientInfo = ClientInfo::findOrFail($id);
        $clients = Client::all();
        $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get(); 
        $stallTypes = StallTypes::all();
        $stallNumbers = StallNumber::all();
        $violations = Violation::all();
    
        return view('client_info.violationbilling', compact('clientInfo', 'clientInfos','violations'));
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

public function storeReport(Request $request)
{
    // Validate the form data
    $request->validate([
        'violation_name' => 'required|string',
        'penalty_value' => 'required|numeric',
        'start_date' => 'required|date',
    ]);

    // Create a new report record
    $report = new Citation();
    $report->violation_name = $request->input('violation_name');
    $report->penalty_value = $request->input('penalty_value');
    $report->start_date = $request->input('start_date');
    // Add any additional fields you need to store

    // Save the report
    $report->save();

    // You can return a response or redirect as needed
    return redirect()->back()->with('success', 'Report submitted successfully.');
}

    public function fetchViolations(Request $request)
    {
        $violations = Violation::all();
        return response()->json(['violations' => $violations]);
    }
}