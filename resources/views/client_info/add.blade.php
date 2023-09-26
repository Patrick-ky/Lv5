@extends('layout')

@section('client_info.add')
<div class="container">

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('client_info.store') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="stalltype_id" class="form-label">Select Client</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <option value="" disabled selected>Select Client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">
                        {{ $client->lastname }} {{ $client->firstname }} {{ $client->middlename }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label for="stalltype_id" class="form-label">Select Stall Type</label>
            <select class="form-control" id="stalltype_id" name="stalltype_id" required>
                <option value="" disabled selected>Select Stall Type</option>
                @foreach ($stalltypes as $stalltype)
                    <option value="{{ $stalltype->id }}">
                        {{ $stalltype->stall_name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-2">
            <label for="stall_number_id" class="form-label">Select Stall Number</label>
            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                <option value="" disabled selected>Select Stall Number</option>
            </select>
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

<script>
    $(document).ready(function () {
        // Stalltype change event
        $('#stalltype_id').change(function () {
            var stalltype_id = $(this).val();
            if (stalltype_id) {
                $.ajax({
                    url: '/get-available-stalls/' + stalltype_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        $('#stall_number_id').empty();
                        $('#stall_number_id').append('<option value="" disabled selected>Select Stall Number</option>');
                        $.each(data, function (key, value) {
                            $('#stall_number_id').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            } else {
                $('#stall_number_id').empty();
                $('#stall_number_id').append('<option value="" disabled selected>Select Stall Number</option>');
            }
        });
    });
</script>
@endsection
