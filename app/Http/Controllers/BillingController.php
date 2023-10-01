<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Billing;
use App\Models\Citation;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class BillingController extends Controller
{

   

    public function index()
    {
        // Group client information by their names and collect stall information
        $clientInfo = ClientInfo::with('client', 'stallNumber', 'stallType')->get();
        $groupedData = [];
    
        foreach ($clientInfo as $billing) {
            $clientName = $billing->client->firstname . ' ' . $billing->client->middlename . ' ' . $billing->client->lastname;
    
            // If the client is not yet in the grouped data, add them
            if (!isset($groupedData[$clientName])) {
                $groupedData[$clientName] = [
                    'client' => $billing->client,
                    'stalls' => [],
                ];
            }
    
            // Add stall information to the client's data
            $groupedData[$clientName]['stalls'][] = [
                'stallType' => $billing->stallType,
                'stallNumber' => $billing->stallNumber,
                'due_date' => $billing->due_date,
                'price' => $billing->stallType->price,
            ];
        }
    
        return view('billings.index', compact('groupedData'));
    }
public function records()
{
    $billings = Billing::with('client', 'violation', 'stallNumber','stallType')->get();

    return view('billings.record', compact('billings'));
}
    // public function index()
    // {
    //     // double  updated price

        
    //     $stalltypes = StallTypes::all();
        
    //     foreach ($stalltypes as $stalltype) {
    //         $stalltype->price *= 2;
    //         $stalltype->save();
    //     }
    //     $billings = Billing::with('client', 'violation')->get();

    //     return view('billings.index', compact('billings'));
    // }

    public function create()
    {
        $clients = Client::all();
        $stalltypes = StallTypes::all();
        $stallnumbers = StallNumber::with('stallType')->get();
    
        $data = [
            'clients' => $clients,
            'stalltypes' => $stalltypes,
            'stallnumbers' => $stallnumbers,
        ];
    
        return view('billings.create', $data);
    }
    
    

    public function store(Request $request)
{
    $data = $request->validate([
        'client_id' => 'required|numeric',
        'stall_number_id' => 'required|numeric',
        'stalltype_id' => 'required|numeric',
    ]);

    // Find the client, stall type, and stall number by their IDs
    $client = Client::findOrFail($data['client_id']);
    $stalltype = StallTypes::findOrFail($data['stalltype_id']);
    $stallnumber = StallNumber::findOrFail($data['stall_number_id']);

    // Calculate the total balance based on the stall type's price
    $stalltypePrice = $stalltype->price;
    $totalBalance = $stalltypePrice;

    $data['total_balance'] = $totalBalance;

    // Add the stall_number_id and stalltype_id to the data array
    $data['stall_number_id'] = $stallnumber->id;
    $data['stalltype_id'] = $stalltype->id;

    $billing = Billing::create($data);

    return redirect(route('billing.index', $billing))->with('success', 'Billing created successfully!');
}


// for billing with violations ni dria na banda sa controller 



public function getDropdownOptions(Request $request)
{
    $clientId = $request->input('clientId');

    // Fetch dropdown options based on the selected client
    $stallTypes = StallTypes::where('client_id', $clientId)->get();
    $stallNumbers = StallNumber::where('client_id', $clientId)->get();
    $violations = Violation::all(); // You can customize this based on your requirements

    return response()->json([
        'stallTypes' => $stallTypes,
        'stallNumbers' => $stallNumbers,
        'violations' => $violations,
    ]);
}



}

