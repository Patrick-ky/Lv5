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
                    <h4>Add Violation</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('addviolation', ['client_id' => $client->id]) }}" method="POST">

                        @csrf
                        <input type="hidden" name="client_id" value="{{ $client->id }}">

                        <div class="mb-2">
                            <label for="stalltype_id" class="form-label">Select Stall Type</label>
                            <select class="form-control" id="stalltype_id" name="stalltype_id" required>
                                <!-- Populate your stall type options here -->
                            </select>
                        </div><br>
                        <div class="mb-2">
                            <label for="stall_number_id" class="form-label">Select Stall Number</label>
                            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                                <!-- Populate your stall number options here -->
                            </select>
                        </div><br>
                        <div class="mb-2">
                            <label for="violation_id" class="form-label">Select Violation</label>
                            <select class="form-control" id="violation_id" name="violation_id" required>
                                <!-- Populate your violation options here -->
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Date of Violation</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Add Violation</button>
                        <span class="or-text">OR</span>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection