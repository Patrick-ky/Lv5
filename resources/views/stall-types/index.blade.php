
@auth
    

@extends('include.header')

@section('stall-types.index')
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
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }

    th, td {
        border: 1px solid black;
        padding: 8px; /* Add some padding for better spacing */
        text-align: center; /* Center-align content */
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="/home"

                class="btn btn-success btn-oblong pulsate" 
                style="background-color: #098309; color:
                                        white; border: 2px solid 
                                    #e7ece2;" >Back to Home</a><br><br>
            <h1 style="color: rgb(192, 247, 167)"><strong>Market Stalls</strong></h1>

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
            <div class="slide-up-content">
            <a
                        href="{{ route('stall-types.create') }}"
                      
                        class="btn btn-success btn-oblong pulsate" 
                        style="background-color: #098309; color:
                                                 white; border: 2px solid 
                                              #e7ece2;
                                              float:right" >Add</a>
                                              <br><br>
                                              

            @if(count($stalltypes) > 0) <!-- Check if there are any stalltypes -->
                <table class="table table-bordered">
                    <thead class="">
                        <tr>
                            <th class="text-center"><strong>Id</strong></th>
                            <th class="text-center"><strong>Stall Name</strong></th>
                            <th class="text-center"><strong>Rent Per Month </strong></th>
                            <th class="text-center"><strong>Stall Number</strong></th>
                            <th class="text-center"><strong>Actions</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stalltypes as $stalltype)
                        <tr>
                            <th class="text-center">{{ $stalltype->id }}</th>
                            <td class="text-center">{{ $stalltype->stall_name }}</td>
                            <td class="text-center">₱{{ $stalltype->price }}</td>
                            <td class="text-center"> 
                                <a href="{{ route('stall-types.stallnumbers.view', ['stallType' => $stalltype->id]) }}" class="btn btn-success">VIEW</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('stall-types.edit', ['stallType' => $stalltype->id]) }}" class="btn btn-success">Edit</a>
                                <form action="{{ route('stall-types.destroy', ['stallType' => $stalltype->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to delete this stall type?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <br><br>
                <p>"No Stalls Recorded"</p> 
                <br><br>
            @endif


            <br>
            @auth
            @endauth
        </div>
    </div></div></div>
</div>
@endsection
@endauth