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
        $clients = Client::all();
        $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get(); 
        $stallTypes = StallTypes::all();
        $stallNumbers = StallNumber::all();
        $violations = Violation::all();
    
        return view('client_info.violationbilling', compact('clientInfo', 'clientInfos','violations'));
    }
    public function addviolation($client_id)
{
    // Retrieve the client data based on the provided client ID
    $client = Client::find($client_id);

    if (!$client) {
        return redirect()->back()->with('error', 'Client not found.');
    }

    // Fetch the list of violations from the Violation model
    $violations = Violation::all();

    // Fetch the list of clientInfos
    $clientInfos = ClientInfo::where('client_id', $client_id)->get();

    // Pass the client, violations, and clientInfos data to the view
    return view('client_info.addviolation', compact('client', 'violations', 'clientInfos'));
}

    
    

public function storeviolation(Request $request)
{
    // Validate the form data
    $request->validate([
        'client_id' => 'required',
        'stall_number_id' => 'required', // Add this validation rule
        'violation_id' => 'required',
        'start_date' => 'required|date',
    ]);

    try {
        // Create a new Citation record
        $citation = new Citation();
        $citation->client_id = $request->input('client_id');
        $citation->stall_number_id = $request->input('stall_number_id'); // Add stall_number_id
        $citation->violation_id = $request->input('violation_id');
        $citation->start_date = $request->input('start_date');
        // You may need to set other fields as needed

        $citation->save();

        return redirect(route('client_info.citation', ['client_id' => $request->input('client_id')]))
            ->with('success', 'Violation added successfully.');
    } catch (\Exception $e) {
        return redirect(route('client_info.citation', ['client_id' => $request->input('client_id')]))
            ->with('error', 'Error adding violation: ' . $e->getMessage());
    }
}

    
    
    
    

    

    public function clientcitation($id)
    {
        $clientInfo = ClientInfo::findOrFail($id);
        
        // Retrieve violations associated with the client using a join query
        $violations = DB::table('violations')
            ->join('citations', 'violations.id', '=', 'citations.violation_id')
            ->where('citations.client_info_id', $clientInfo->id)
            ->select('violations.violation_name', 'violations.penalty_value', 'citations.start_date')
            ->get();
        
        return view('client_info.citation', compact('clientInfo', 'violations'));
    }
    

}

    

