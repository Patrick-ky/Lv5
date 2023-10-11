<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        

        $distinctFullNames = Client::select('firstname', 'middlename', 'lastname')
            ->groupBy('firstname', 'middlename', 'lastname')
            ->get();

        $clients = Client::whereIn('id', function ($query) use ($distinctFullNames) {
            $query->selectRaw('MIN(id)')
                ->from('clients')
                ->whereIn('firstname', $distinctFullNames->pluck('firstname'))
                ->whereIn('middlename', $distinctFullNames->pluck('middlename'))
                ->whereIn('lastname', $distinctFullNames->pluck('lastname'))
                ->groupBy('firstname', 'middlename', 'lastname');
        })
        ->with('stallNumber', 'stallType')
        ->select('id', 'firstname', 'middlename', 'lastname', 'age', 'address', 'gender', 'clients_number')
        ->get();

        return view('clients.index', compact('clients'));
    }

    public function addclients()
    {
        $clients = Client::all();

        $data = [
            'clients' => $clients,
        ];

        return view('clients.addclients', $data);
    }
    public function clientstore(Request $request)
    {
        $rules = [
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'Age' => 'required|numeric', // Added 'Age' field
            'clients_number' => 'required|numeric',
            'gender' => 'required|in:Male,Female',
            'Address' => 'required|string|max:255'
        ];
    
        $messages = [
            'unique' => 'A client with the same first name, middle name, and last name already exists.',
        ];
    
        $validatedData = $request->validate($rules, $messages);
    
        $existingClient = Client::where([
            'firstname' => $validatedData['firstname'],
            'middlename' => $validatedData['middlename'],
            'lastname' => $validatedData['lastname'],
        ])->first();
    
        if ($existingClient) {
            return redirect()->route('clients.index')->with('error', 'A client with the same name already exists.');
        }
    
        Client::create($validatedData);
    
        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }
    

    public function updateClient(Request $request, $id)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'clients_number' => 'required|numeric',
            'Age' => 'required|numeric',
            'Gender' => 'required|in:Male,Female', // Added validation for Gender
        ]);

        try {
            $client = Client::findOrFail($id);

            list($firstname, $middlename, $lastname) = explode(' ', $validatedData['full_name'], 3);

            $client->update([
                'firstname' => $firstname,
                'middlename' => $middlename,
                'lastname' => $lastname,
                'clients_number' => $validatedData['clients_number'],
                'Gender' => $validatedData['Gender'], // Update Gender field
            ]);

            return redirect()->route('clients.index')->with('success', 'Client information updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('clients.editclient', ['id' => $id])->with('error', 'Failed to update client information. Please try again.');
        }
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);
    
        // Display an error message and prevent deletion
        return redirect()->back()->with('error', 'Cannot delete Stall Owner (Has Associations with stalls, bills, etc.)');
    }

    public function editClient($id)
    {
        $client = Client::findOrFail($id);
        $clients = Client::with('stallNumber')->get();
        // You can load the stallnumbers and stalltypes here if needed.

        return view('clients.editclient', compact('client', 'clients'));
    }


}














    // public function clientstore(Request $request)
    // {
    //     $rules = [
    //         'firstname' => 'required|string|max:255',
    //         'middlename' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'clients_number' => 'required|numeric',
    //     ];
    
    //     // Custom validation messages
    //     $messages = [
    //         // 'stall_number_id.exists' => 'The selected stall number does not exist.',
    //         // 'stalltype_id.exists' => 'The selected stall type does not exist.',
    //     ];
    //     $validatedData = $request->validate($rules, $messages);
    //     try {
    //         // Check if the selected stall number belongs to the specified stall type
    //         $stallType = StallTypes::findOrFail($validatedData['stalltype_id']);
    
    //         // Find the stall number by ID
    //         $stallNumber = StallNumber::findOrFail($validatedData['stall_number_id']);
    
    //         // Check if the selected stall number is available
    //         if ($stallNumber->status !== 'available') {
    //             throw ValidationException::withMessages(['stall_number_id' => 'The selected stall number is not available.']);
    //         }
    
    //         // Update the stall number status to "occupied"
    //         $stallNumber->status = 'occupied';
    //         $stallNumber->save();
    
    //         // Create the client record with the non-nullable stall_number_id
    //         $clientData = [
    //             'firstname' => $validatedData['firstname'],
    //             'middlename' => $validatedData['middlename'],
    //             'lastname' => $validatedData['lastname'],
    //             'clients_number' => $validatedData['clients_number'],
    //         ];
    
    //         $client = Client::create($clientData);
    
    //         // Commit the database transaction
    //         DB::commit();
    
    //         return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    //     } catch (\Exception $e) {
    //         // Something went wrong, rollback the transaction
    //         DB::rollBack();
    
    //         // Log the error or handle it as needed
    //         return redirect()->route('clients.addclients')->with('error', 'Failed to create client. Please try again.');
    //     }
        
    // }


    
//     public function deleteClient(Request $request, $id)
// {
//     DB::beginTransaction();
//     try {
//         // Find the client to be deleted
//         $client = Client::findOrFail($id);

//         // Get the associated stall number (if exists)
//         $stallNumber = $client->stall_number;

//         // Delete the client
//         $client->delete();

//         // If a stall number was associated, update its status to 'available'
//         if ($stallNumber) {
//             $stallNumber->status = 'available';
//             $stallNumber->save();
//         }

//         DB::commit();

//         return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
//     } catch (\Exception $e) {
//         // Something went wrong, rollback the transaction
//         DB::rollBack();

//         // Handle the exception or log the error as needed
//         return redirect()->route('clients.index')->with('error', 'Failed to delete client. Please try again.');
//     }
// }


