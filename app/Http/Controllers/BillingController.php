<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Billing;
use App\Models\Violation;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class BillingController extends Controller
{

   

    public function index()
    {
        $clientInfo = ClientInfo::with('client', 'stallNumber', 'stallType')->get();
    
        return view('billings.index', compact('clientInfo'));
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



public function violationbilling()
{

    $BillandViolations = Billing::with('client', 'violation', 'stallNumber','stallType')->get();
 
    return view('client_info.violationbilling',compact('BillandViolations'));
}

}

