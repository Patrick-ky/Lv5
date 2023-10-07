@extends('include.header')

@section('stall-types.stallnumbers.view')

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

            <h1><strong>Stalls on : {{ $stallType->stall_name }}</h1>

            @if(count($stallNumbers) > 0) <!-- Check if there are any stall numbers -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Stall Number</strong></th>
                            <th class="text-center"><strong>Stall Code</strong></th>
                            <th class="text-center"><strong>Landmark</strong></th> <!-- Added this line -->
                            <th class="text-center"><strong>Status</strong></th>
                            <th class="text-center"><strong>Actions</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stallNumbers as $stallNumber)
                        <tr>
                            <td>{{$stallNumber->stall_number}}</td>
                            <td>{{ $stallNumber->nameforstallnumber }}</td>
                            <td>{{ $stallNumber->description }}</td> <!-- Added this line -->
                            <td>{{ $stallNumber->status }}</td>
                            <td>
                                <form action="{{ route('stall-numbers.destroy', $stallNumber) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <br><br>
                <p>"No Stall Numbers Recorded"</p> <!-- Display this message when no stall numbers are available -->
            <br><br>
            @endif

            <br>

            <!-- Add the "Add Stall Number" button outside the foreach loop -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addStallModal">Add Stall Number</button>

            <!-- Add the "Back" button that redirects to the previous page -->
            <a href="{{ route('stall-types.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
<!-- Modal -->


<div class="modal fade" id="addStallModal" tabindex="-1" role="dialog" aria-labelledby="addStallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStallModalLabel">Add Stall Number</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
            <div class="modal-body">
                {{-- Display a form to add a new lot number here --}}
                <form method="POST" action="{{ route('stall-types.stallnumbers.store') }}">
                    @csrf
                <div class="container">
                    <input type="hidden" name="stall_type_id" value="{{ $stallType->id }}">

                    <div class="mb-3">
                        <label for="stall_number">Stall Number:</label>
                        <input type="text" class="form-control" name="stall_number" id="stall_number" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="nameforstallnumber">Stall Code:</label>
                        <input type="text" class="form-control" name="nameforstallnumber" id="nameforstallnumber" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description">Landmark:</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</div>
@endsection
