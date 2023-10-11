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
    
    $clientinfos = with('client', 'stallNumber','stallType')->get();
    $violations = Citation::all();

    return view('billings.record', compact('violations','clientinfos','stallType'));
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

    // public function create()
    // {
    //     $clients = Client::all();
    //     $stalltypes = StallTypes::all();
    //     $stallnumbers = StallNumber::with('stallType')->get();
    
    //     $data = [
    //         'clients' => $clients,
    //         'stalltypes' => $stalltypes,
    //         'stallnumbers' => $stallnumbers,
    //     ];
    
    //     return view('billings.create', $data);
    // }
    
    

}








