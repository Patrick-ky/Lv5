@extends('include.header')

@section('client_info.violationbilling')

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
    <style>
        @keyframes slide-up {
            0% {
                transform: translateY(35%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        p{
            color: rgb(192, 247, 167); 
        }
    
        .slide-up-content {
            animation: slide-up 0.5s ease-in-out;
        }
    
        table {
            border: 1px solid black;
            width: 120%;
            border-collapse: collapse;
        }

        table {
        border: 1px solid black;
        width: 120%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 100px;
        text-align: center;
    }

    th {
        background-color: #333;
        color: white;
        font-size: 14px;
    }

    .btn-success {
        background-color: #098309;
        color: white;
        border: 2px solid #e7ece2;
    }

    .btn-success:hover {
        background-color: #0a940b;
    }
        </style>


<div class="container">
    <div class="row">
        <div class="col-md-20">
            <h2 style="color: rgb(192, 247, 167)"><strong>Stall Owner Information:</strong></h2>

           
            <p class="p"><strong>Name:</strong> {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</p>
            <p class="p"><strong>Contact Number:</strong> {{ $clientInfo->client->clients_number }}</p>
            <p class="p"><strong>Address:</strong> {{ $clientInfo->client->Address }}</p>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="col-md-20">
        <h2 style="color: rgb(192, 247, 167)"><strong>Stalls Owned:</strong></h2>
        <div>
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><strong>Stall Number</strong></th>
                        <th class="text-center"><strong>Stall Code</strong></th>
                        <th class="text-center"><strong>Landmark</strong></th>
                        <th class="text-center"><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientInfos as $client)
                    <tr>
                        <td>{{ $client->stallNumber->stall_number }}</td>
                        <td>{{ $client->stallNumber->nameforstallnumber }}</td>
                        <td>{{ $client->stallNumber->description }}</td>
                        <td style="align-content: center">
<a href="{{ route('client_info.view_citations', ['stall_id' => $client->stallNumber->id]) }}" type="button" class="btn btn-primary">View Violations</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>





@endsection