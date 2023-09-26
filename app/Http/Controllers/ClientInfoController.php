<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientInfo;
use App\Models\StallTypes;
use App\Models\StallNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class ClientInfoController extends Controller

{
    public function index()
    {
        $clientInfoModels = ClientInfo::with(['client', 'stallNumber', 'stallType'])->get();

        return view('client_info.index', compact('clientInfoModels'));
    }

    public function addclientinfo()
    {
        $clients = Client::all();
        $stalltypes = StallTypes::all();
        $stallnumbers = StallNumber::all();

        return view('client_info.add', compact('clients', 'stalltypes', 'stallnumbers'));
    }

    public function clientinfostore(Request $request)
    {
        // Validation rules and messages
        $rules = [
            'client_id' => 'required|exists:clients,id',
            'stalltype_id' => 'required|exists:stall_types,id',
            'stall_number_id' => 'required|exists:stall_numbers,id',
            'start_date' => 'required|date',
            'due_date' => 'required|date|after:start_date',
        ];

        $messages = [
            'stall_number_id.exists' => 'The selected stall number does not exist.',
            'stalltype_id.exists' => 'The selected stall type does not exist.',
            'due_date.after' => 'The due date must be after the start date.',
        ];

        // Validate the request
        $validatedData = $request->validate($rules, $messages);

        try {
            DB::beginTransaction();

            // Check if the selected stall number belongs to the specified stall type
            $stallType = StallTypes::findOrFail($validatedData['stalltype_id']);
            $stallNumber = StallNumber::findOrFail($validatedData['stall_number_id']);

            if ($stallNumber->stall_type_id !== $stallType->id) {
                throw ValidationException::withMessages(['stall_number_id' => 'The selected stall number is not valid for the chosen stall type.']);
            }

            // Check if the selected stall number is available
            if ($stallNumber->status !== 'available') {
                throw ValidationException::withMessages(['stall_number_id' => 'The selected stall number is not available.']);
            }

            // Update stall number status to 'occupied'
            $stallNumber->status = 'occupied';
            $stallNumber->save();

            // Create the client info record
            ClientInfo::create($validatedData);

            DB::commit();

            return redirect()->route('client_info.index')->with('success', 'Client info created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client_info.index')->with('error', 'Failed to create client info. Please try again.');
        }
    }
    public function updateClient(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'stalltype_id' => 'required|exists:stall_types,id',
            'stall_number_id' => 'required|exists:stall_numbers,id',
        ]);

        $clientInfo = ClientInfo::findOrFail($id);

        try {
            DB::beginTransaction();

            // Check if the selected stall number belongs to the specified stall type
            $stallType = StallTypes::findOrFail($validatedData['stalltype_id']);
            $stallNumber = StallNumber::findOrFail($validatedData['stall_number_id']);

            if ($stallNumber->stall_type_id !== $stallType->id) {
                throw ValidationException::withMessages(['stall_number_id' => 'The selected stall number is not valid for the chosen stall type.']);
            }

            $clientInfo->update($validatedData);

            DB::commit();

            return redirect()->route('client_info.index')->with('success', 'Client info updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('client_info.index')->with('error', 'Failed to update client info. Please try again.');
        }
    }

    public function addStall()
{
    $stallTypes = StallTypes::all();
    $stallNumbers = StallNumber::all();

    return view('client_info.add_stall', compact('stallTypes', 'stallNumbers'));


}

public function storeStall(Request $request)
{
    $validatedData = $request->validate([
        'stall_name' => 'required|string|max:255',
        'stall_number' => 'required|string|max:255',
    ]);

    // Create a new stall record
    StallTypes::create([
        'stall_name' => $validatedData['stall_name'],
        'stall_number' => $validatedData['stall_number'],
    ]);

    return redirect()->route('add_stall')->with('success', 'Stall added successfully!');
}

public function getAvailableStalls($stalltype_id)
{
    // Retrieve available stall numbers for the selected stall type
    $availableStalls = StallNumber::where('stall_type_id', $stalltype_id)
        ->where('status', 'available')
        ->pluck('stall_number', 'id');

    return response()->json($availableStalls);
}

public function view($id)
{
    $clientInfo = ClientInfo::findOrFail($id);
    $clients = Client::all();
    $clientInfos = ClientInfo::where('client_id', $clientInfo->client_id)->get(); // Filter by client_id
    $stallTypes = StallTypes::all();
    $stallNumbers = StallNumber::all();

    return view('client_info.view', compact('clientInfo', 'clientInfos'));
}


}
