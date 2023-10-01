<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Billing;
use App\Models\Violation;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

class ViolationController extends Controller
{

    public function index()
    {
        $violations = Violation::all();

        $data = [
            'violations' => $violations,
        ];

        return view('violations.index', $data);
    }


    public function create()
    {
        $clients = Client::all();
        $stallTypes = StallTypes::all();
        $stallNumbers = StallNumber::where('status', 'occupied')->get();
        
        return view('violations.create', compact('clients', 'stallTypes', 'stallNumbers'));
    }


//     public function store(Request $request)
// {
//     // Validate the form data
//     $data = $request->validate([
//         'client_id' => 'required|exists:clients,id',
//         'stalltype_id' => 'required|exists:stall_types,id',
//         'stall_number_id' => 'required|exists:stall_numbers,id',
//         'violation_name' => 'required',
//         'penalty_value' => 'required|numeric',
//     ]);

//     // Create a new Violation record
//     $violation = Violation::create($data);

//     if ($violation) {
//         // The violation was successfully created
//         return redirect()->route('violation.index')->with('success', 'Violation successfully created!');
//     } else {
//         // There was an error creating the violation
//         return redirect()->route('violation.create')->with('error', 'Failed to create violation. Please try again.');
//     }
// }

//     public function edit($id)
// {
//     $violation = Violation::findOrFail($id);

//     return view('violations.edit', compact('violation'));
// }

// public function update(Request $request, $id)
// {
//     $data = $request->validate([
//         'violation_name' => 'required',
//         'penalty_value' => 'required|numeric',
//     ]);

//     $violation = Violation::findOrFail($id);

//     $violation->penalty_value = $data['penalty_value'];
//     // Update the violation attributes based on the form data
//     $violation->update($data);

//     // Update the total_balance in associated billing records
//     $billings = Billing::where('violation_id', $id)->get();

//     foreach ($billings as $billing) {
//         $client = $billing->client; 
//         $stallType = $client->stallType;
//         $stalltypePrice = $stallType->price;
        
//         $billing->total_balance = $violation->penalty_value + $stalltypePrice;
//         $billing->save();
//     }


//     return redirect()->route('violation.index')->with('success', 'Violation updated successfully');
// }

// public function destroy($id)
// {
//     try {
//         $violation = Violation::findOrFail($id);
//         $violation->delete();

//         return redirect()->route('violation.index')->with('success', 'Violation deleted successfully');
//     } catch (\Illuminate\Database\QueryException $e) {
//         return redirect()->route('violation.index')->with('error', 'Cannot delete violation. Some clients may have acquired it.');
//     }
// }

public function viewViolation($id)
{
    // para ma fetch ang single violation basi sa ID
    $violation = Violation::with('client', 'stallNumber')->find($id);

    if (!$violation) {
        // Handle the case where the violation with the given ID is not found
        return redirect()->route('violations.index')->with('error', 'Violation not found.');
    }

    return view('violations.view', compact('violation'));
}

}
