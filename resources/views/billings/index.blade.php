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
            <h2 class="text-dark">Billings</h2>

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
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Stall Category</th>
                            <th class="text-center">Stall Code</th>
                            <th class="text-center">Monthly</th>
                            <th class="text-center">Due Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientInfo as $billing)
                        <tr>
                            <td class="text-center">{{ $billing->client->firstname }} {{ $billing->client->middlename }} {{ $billing->client->lastname }}</td>
                            <td class="text-center"> {{ $billing->stallType->stall_name }}  </td>
                            <td class="text-center"> {{ $billing->stallNumber->nameforstallnumber }} </td>
                           
                            
                            <td class="text-center">{{ $billing->stallType->price }}</td>
                            <td class="text-center">{{ \Carbon\Carbon::parse($billing->due_date)->format('F j, Y') }}</td>

                            <td class="text-center">
                                <a href="" class="btn btn-primary">Update</a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            <br>
            <form action='/create-billingskie' method="GET">
                <button type="submit" class="btn btn-primary">Create new Billing</button>
            </form>

            
        </div>
    </div>
</div>



@endsection
