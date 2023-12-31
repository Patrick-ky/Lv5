
@auth
    

@extends('include.header')

@section('stall-types.index')
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><strong>Stalls</strong></h1>

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
                                <a href="{{ route('stall-types.stallnumbers.view', ['stallType' => $stalltype->id]) }}" class="btn btn-primary">VIEW</a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('stall-types.edit', ['stallType' => $stalltype->id]) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('stall-types.destroy', ['stallType' => $stalltype->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this stall type?')">Delete</button>
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
            <form action="{{ route('stall-types.create') }}" method="GET">
                <button type="submit" class="btn btn-primary">Create Stall Type</button>
            </form>
            @endauth
        </div>
    </div>
</div>
@endsection
@endauth