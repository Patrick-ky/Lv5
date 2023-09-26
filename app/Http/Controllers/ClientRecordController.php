<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\ClientRecord; // Use the correct namespace

class ClientRecordController extends Controller
{
    public function index()
    {
        $clientRecords = ClientRecord::all(); // Correct the method name

        return view('clientrecords.index', compact('clientrecords'));
    }
}
