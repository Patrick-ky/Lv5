@extends('layout')

@section('client_info.view')



<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row justify-content-center"> 
        <div class="col-md-12">
                <div class="mb-4">
                <h4><label class="form-label"><strong>Name:</strong> {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</label></h4>
                </div>
                <div class="md-2 justify-content-center float-left">
                    <a href="{{ route('violationbilling', ['client_id' => $clientInfo->id]) }}" class="btn btn-danger">View Violations</a>
                    <tr>
                        <td><strong>Citations:</strong></td>
                        <td>0</td>
                    </tr>
                </div><br><br>
                
               

<div class="table-responsive">
    <table class="table table-bordered custom-table">
        <thead>
            <tr>
                <th class="text-center">Stall Number</th>
                <th class="text-center">Stall Code</th>
                <th class="text-center">Stall Type</th>
                <th class="text-center">Landmark</th>
                
            
        </thead>
        <tbody>
            @foreach ($clientInfos as $client)
          
                <td>{{ $client->stallNumber->stall_number }}</td>
                <td>{{$client->stallNumber->nameforstallnumber}}</td>
                <td>{{ $client->stallType->stall_name }}</td>
                <td>{{ $client->stallNumber->description }}</td>
                
            </tr>   
            @endforeach     
        </tbody>

    </table>


</div>

        </div>    
    </div>      
</div>

    </div>
</div>
<style>
    .th {
        width: 20%;
    }
</style>
@endsection
