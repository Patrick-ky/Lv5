@extends('include.header')

@section('client_info.addbilling')
<style>
    h2 strong {
        margin-right: 15px; /* Adjust the margin as needed to create the desired spacing */
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">

            <!-- Form for adding violations -->
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    <h4>Add Violation for Stall:</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('client_info.storeviolation') }}" method="POST">
                        @csrf
                        <input type="hidden" name="client_id" value="">
                        <input type="hidden" name="stall_number_id" value="{{ $client->stall_number_id }}"> <!-- Add this line -->
                        <div class="mb-2">
                            <label for="violation_id" class="form-label">Select Violation</label>
                            <select class="form-control" id="violation_id" name="violation_id" required>
                                <option value="" disabled selected>Select Violation</option> 
                                @foreach($violations as $violation)
                                    <option value="{{ $violation->id }}">{{ $violation->violation_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Date of Violation</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Add Violation</button>
                    </form>
                    



                </div>
            </div>
       
    </div>

@endsection