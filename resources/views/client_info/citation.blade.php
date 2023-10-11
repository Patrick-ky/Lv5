@extends('include.header')

@section('client_info.citation')

<div class="container">
    <h3><strong>Citations for Stall: {{ $stall->nameforstallnumber }}</strong></h3>
    <div class="row">
        <div class="col-md-6">
            
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-danger float-right" href="{{ route('client_info.report_citation_form', ['client_id' => $clientInfo->id, 'stall_number_id' => $stall->id]) }}" type="button" class="btn btn-danger">ADD CITATION</a>
    </div>
    

    <br>
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
    <br><br>


   
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center"><strong>Violation Name</strong></th>
                <th class="text-center"><strong>Penalty Price</strong></th>
                <th class="text-center"><strong>Date Acquired</strong></th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalBalance = 0; // Initialize the total balance variable
            @endphp
            @foreach($citations as $citation)
            <tr>
                
                <td>{{ $citation->violation->violation_name }}</td>
                <td>₱ {{ $citation->violation->penalty_value }}</td>
                <td>{{ \Carbon\Carbon::parse($citation->start_date)->format('F j, Y') }}</td>

                
            </tr>
            @php
            $totalBalance += $citation->violation->penalty_value; 
           @endphp
            @endforeach
            <tr class="borderless">
 
              
                <td><b>TOTAL:</b></td>
                <td>₱ {{$totalBalance}}.00</td>
                <td></td>
                
            </tr>
        </tbody>
    </table>
</div>








<script src="{{ asset('js/script.js') }}"></script>
@endsection
