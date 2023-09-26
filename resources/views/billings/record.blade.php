@extends('include.header')
<style>
    table {
        border: 1px solid black;
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }

    th, td {
        border: 1px solid black;
        padding: 8px; /* Add some padding for better spacing */
        text-align: center; /* Center-align content */
    }


    tr.borderless td {
        border: none;
    }

    
</style>

@section('billings.index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark"> Records</h2>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            {{-- <div class="table-responsive"> --}}
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Monthly</th>
                            <th class="text-center">Violation</th>
                            <th class="text-center">Penalty Price</th>
                            <th class="text-center">Stall Number</th>
                            <th class="text-center">Total Balance</th>
                          
                            
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $totalBalance = 0; // Initialize the total balance variable
                        @endphp
                        
                        @foreach($billings as $billing)
                        <tr>
                            <td class="text-center">{{ $billing->client->firstname }} {{ $billing->client->middlename }} {{ $billing->client->lastname }}</td>
                            <td class="text-center">{{ $billing->stallType->price }}</td>
                            <td class="text-center"> {{ $billing->violation->violation_name }}</td>
                            <td class="text-center"> {{ $billing->violation->penalty_value }} </td>
                            <td class="text-center"> {{ $billing->stallNumber->stall_number }} </td>
                            <td class="text-center">{{ $billing->total_balance }}</td>

                
                            
                        </tr>
                        @php
                         $totalBalance += $billing->total_balance  ; // Add each billing amount to the total
                        @endphp
                        @endforeach
                        <tr class="borderless">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><b>TOTAL:</b></td>
                            <td>₱ {{$totalBalance}}.00</td>
                            
                        </tr>

    
                       
                    </tbody>
                </table>
            {{-- </div> --}}

        

        </div>
    </div>
</div>


@endsection
