<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Citation;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitationController extends Controller
{
    public function violationbilling($id)
    {
        $clientInfo = ClientInfo::findOrFail($id);
        $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get();
        $violations = Violation::all();
    
        return view('client_info.violationbilling', compact('clientInfo', 'clientInfos', 'violations'));
    }
    
    public function reportCitationForm($client_id)
    {
        // Retrieve the client information
        $clientInfo = ClientInfo::findOrFail($client_id);

        // Retrieve the list of violations
        $violations = Violation::all();

        return view('client_info.report-citation', compact('clientInfo', 'violations'));
    }

    public function storeCitation(Request $request)
{
    // Validate the form data
    $request->validate([
        'violation_id' => 'required|exists:violations,id',
        'start_date' => 'required|date',
        'client_info_id' => 'required|exists:client_info,id',
        'stall_number_id' => 'required|exists:stall_numbers,id', // Add validation for stall_number_id
    ]);

    // Get the selected stall_number_id from the request
    $stallNumberId = $request->input('stall_number_id');

    // Find the corresponding stall record
    $stall = StallNumber::findOrFail($stallNumberId);

    // Create and store the citation data in the databasew
    $data = [
        'client_info_id' => $request->input('client_info_id'),
        'violation_id' => $request->input('violation_id'),
        'stalltype_id' => $stall->stall_type_id, // Assign stall type based on the selected stall
        'stall_number_id' => $stallNumberId,
        'start_date' => $request->input('start_date'),
    ];

    Citation::create($data);

    return redirect(route('client_info.violationbilling', ['id' => $request->input('client_info_id')]))
        ->with('success', 'Citation created successfully.');
}


public function clientcitation($id)
{
    // Retrieve the ClientInfo model with the related stallNumber
    $clientInfo = ClientInfo::with('stallNumber')->findOrFail($id);

    // Check if the $clientInfo variable is not null
    if (!$clientInfo) {
        // Handle the case where the ClientInfo record was not found
        return redirect()->route('client_info.violationbilling')
            ->with('error', 'Client Info not found');
    }

    // Retrieve violations associated with the client using a join query
    $citations = Citation::all();

    return view('client_info.citation', compact('clientInfo', 'citations'));
}

}
