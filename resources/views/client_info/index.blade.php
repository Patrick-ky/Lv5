@extends('include.header')

@section('client_info.index')
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

    .slide-up-content {
        animation: slide-up 0.5s ease-in-out;
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

    .alert {
        padding: 10px;
        margin-bottom: 15px;
    }

    .alert-success {
        background-color: #4CAF50;
        color: white;
    }

    .alert-danger {
        background-color: #f44336;
        color: white;
    }
</style>

<body>
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

    <div class="container">
            <a href="/home"

    class="btn btn-success btn-oblong pulsate" 
    style="background-color: #098309; color:
                            white; border: 2px solid 
                        #e7ece2;" >Back to Home</a><br><br>
        
    <h2 style="color: rgb(192, 247, 167)"><strong>Stall Holders Profile</strong></h2>
        <div class="col-md-12">
            <a href="{{ route('client_info.add') }}" class="btn btn-success btn-oblong pulsate ml-5" style="float: right">Add</a>
           
        </div>           
           <br><br><br><br>
       
   

    <div class="container">
    <div class="slide-up-content">
       

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"><strong>Stall Holder Name</strong></th>
                    <th class="text-center"><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach($groupedData as $clientName => $clientInfo)
                    <tr>
                        <td>{{ $clientName }}</td>
                        <td>
                            <a href="{{ route('client_info.violationbilling', ['id' => $clientInfo->id]) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div></div>
</body>
@endsection
