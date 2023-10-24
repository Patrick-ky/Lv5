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
    <a href="{{ route('stall-types.index') }}" class="btn btn-secondary">Back</a>
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

            <h1 style="color: rgb(159, 248, 118)"><strong>Stalls on : {{ $stallType->stall_name }}</h1>

            @if(count($stallNumbers) > 0) <!-- Check if there are any stall numbers -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><strong>Stall Number</strong></th>
                            <th class="text-center"><strong>Stall Code</strong></th>
                            <th class="text-center"><strong>Description</strong></th> <!-- Added this line -->
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
                                    <button type="submit" class="btn btn-secondary">Delete</button>
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

            <!-- Add the "Back" button that redirects to the previous page -->
            
        </div>
    </div>
</div>





            </div>
        </div>
    </div>
</div>
@endsection
