@extends('include.header')
@section('stall-number.index')

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
        animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
    }
    
    table {
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }

    .pagination a.active {
        background-color: #4CAF50;
        color: white;
    }

    .pagination a:hover:not(.active) {
        background-color: #ddd;
    }
</style>

<div class="container">
    <a href="/home" class="btn btn-success btn-oblong pulsate" style="background-color: #098309; color: white; border: 2px solid #e7ece2;">Back to Home</a><br><br>
    <div class="row">
        <div class="col-md-12">
            <h1 style="color: rgb(159, 248, 118)"><strong>Stalls</strong></h1><br>

            <div class="slide-up-content">

                <div class="col-md-12">
                    <div style="float: right">
                    <p style="color: rgb(159, 248, 118)"><strong>Available</strong> Stalls: </strong>{{ $availableStallsCount }}</strong></p>
                    <p style="color: rgb(159, 248, 118)"><strong>Occupied</strong> Stalls: </strong>{{ $occupiedStallsCount }}</strong></p><br>
                    </div>
                    <div class="slide-up-content">
                        
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Stall Number</th>
                            <th>Name for Stall Number</th>
                            <th>Description</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stallNumbers as $stallNumber)
                            <tr>
                                <td>{{ $stallNumber->stall_number }}</td>
                                <td>{{ $stallNumber->nameforstallnumber }}</td>
                                <td>{{ $stallNumber->description }}</td>
                                <td>{{ $stallNumber->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagination">
                {{ $stallNumbers->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
