@extends('layout')

@section('client_info.add')
<div class="container">

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('client_info.storecitation') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="stall_type_id">Select Stall Type</label>
            <select class="form-control" id="stall_type_id" name="stall_type_id" required>
                <option value="" disabled selected>Select Stall Type</option>
                @foreach ($stallTypes as $stallType)
                    <option value="{{ $stallType->id }}">{{ $stallType->stall_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="stall_number_id">Stall Number</label>
            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                <option value="" disabled selected>Select Stall Number</option>
            </select>
        </div>
        
        

        </div>

        <div class="form-group">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="form-group">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div><br>

        <button type="submit" class="btn btn-primary">Add Client Info</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Get references to the select elements
    const $stallTypeSelect = $('#stall_type_id');
    const $stallNumberSelect = $('#stall_number_id');

    // Add an onchange event handler to the Stall Type select element
    $stallTypeSelect.on('change', function () {
        const selectedStallType = $(this).val();
        const clientId = "{{ $clientInfo->id }}"; // Replace with your actual client ID

        // Make an AJAX request to fetch associated stall numbers
        $.ajax({
            url: `/fetch-stall-numbers?stallType=${selectedStallType}&clientId=${clientId}`,
            method: 'GET',
            success: function (data) {
                // Clear existing options
                $stallNumberSelect.empty();

                // Add the default "Select Stall Number" option
                $stallNumberSelect.append('<option value="" disabled selected>Select Stall Number</option>');

                // Add the retrieved stall numbers to the select element
                data.forEach(function (stallNumber) {
                    $stallNumberSelect.append(`<option value="${stallNumber.id}">${stallNumber.nameforstallnumber}</option>`);
                });
            },
            error: function (xhr, textStatus, errorThrown) {
                console.error('Error:', errorThrown);
            }
        });
    });
</script>


@endsection