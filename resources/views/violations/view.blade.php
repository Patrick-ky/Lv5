@extends('include.header')
{{-- @section('title', 'View Violation') --}}
@section('violation.view')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Violation Details</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        {{-- <th class="text-center">Client name</th> --}}
                        {{-- <th class="text-center">Stall Number</th> --}}
                        <th class="text-center">Client Name</th>
                        <th class="text-center">Stall Number with Violations</th>
                        <th class="text-center">Violation Name</th>
                        <th class="text-center">Penalty Value</th>
                        <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                       
                            
                      
                        {{-- <td class="text-center">{{ $violation->client->firstname }} {{ $violation->client->middlename }} {{ $violation->client->lastname }}</td> --}}
                        {{-- <td class="text-center">{{ $client->stall_number}}</td> --}}
                        <td class="text-center">sample</td>
                        <td class="text-center">sample</td>
                        <td class="text-center">{{ $violation->violation_name }}</td>
                        <td class="text-center">{{ $violation->penalty_value }}</td>
                        <td class="text-center">{{ $violation->created_at->format('Y-m-d') }}</td>
                    </tr>

                </tbody>
                
            </table><br>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='/billingskie'">Back</button>
        </div>
    </div>
</div>

@endsection
