@extends('include.header')

@section('client_info.report-citation')
<style>
    /* Define a custom CSS class for borderless input fields */
    .borderless-input {
        border: none;
        background-color: transparent;
        outline: none; /* Remove the outline when the input is focused */
    }
</style><br><br>
<div class="container">
    <h3><strong>Citations for Stall: {{ $stall->nameforstallnumber }}</strong></h3>
<!-- Other form elements -->

    <form action="{{ route('client_info.store_citation') }}" method="POST">
        @csrf

        <input type="hidden" name="client_info_id" value="{{ $clientInfo->client->id }}">
        <input type="hidden" name="stall_type_id" value="{{ $clientInfo->stall_type_id }}">
        <input type="hidden" name="stall_id" value="{{ $stall->id }}">
        

        <div class="form-group">
            <label for="violation_id">Violation</label>
            <select class="form-control" id="violation_id" name="violation_id" required>
                <option value="" disabled selected>Select Violation</option>
                @foreach ($violations as $violation)
                    <option value="{{ $violation->id }}">{{ $violation->violation_name}} (Price:{{ $violation->penalty_value}})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="acquiredviolationprice">Set Acquired Violation Price for Stall</label>
            <input type="number" step="0.01" class="form-control" id="acquiredviolationprice" name="acquiredviolationprice" placeholder="Enter Amount Based on Violation's Price" required>
        </div>

        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <!-- Add more form fields as needed -->

        <button type="submit" class="btn btn-primary">Create Citation</button>
    </form>
</div>
@endsection