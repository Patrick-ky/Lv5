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
    
</style>

@section('billings.index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark"><strong>Billings</strong></h2>

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

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Full Name</th>
                            <th class="text-center"><strong>Stall Category</th>
                            <th class="text-center"><strong>Stall Code</th>
                            <th class="text-center"><strong>Monthly</th>
                            <th class="text-center"><strong>Due Date</th>
                            <th class="text-center"><strong>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientInfo as $billing)
                        <tr>
                            <td class="text-center"><strong>{{ $billing->client->firstname }} {{ $billing->client->middlename }} {{ $billing->client->lastname }}</td>
                            <td class="text-center"> <strong>{{ $billing->stallType->stall_name }}  </td>
                            <td class="text-center"><strong> {{ $billing->stallNumber->nameforstallnumber }} </td>
                           
                            
                            <td class="text-center"><strong>{{ $billing->stallType->price }}</td>
                            <td class="text-center"><strong>{{ \Carbon\Carbon::parse($billing->due_date)->format('F j, Y') }}</td>

                            <td class="text-center">
                                <a href="" class="btn btn-primary">Update</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            <br>
            
        </div>
    </div>
</div>



@endsection
