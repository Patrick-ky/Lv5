@auth
@extends('layout')

@section('clients.edit')
<div class="container">
    <div class="card-body">
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

        <form action="{{ route('updateClient', ['id' => $client->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $client->firstname }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $client->middlename }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $client->lastname }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="Age" name="Age" value="{{ $client->Age }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" value="{{ $client->clients_number }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male" {{ $client->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $client->gender === 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" value="{{ $client->Address }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#stalltype_id').on('change', function () {
            var selectedStallTypeId = $(this).val();
            $('#stall_number_id option').hide(); // Hide all options
            $('#stall_number_id option[data-stall-type="' + selectedStallTypeId + '"]').show(); // Show options matching selected stall type
            $('#stall_number_id').val(''); // Reset the selected value
        });
    });
</script>

@endsection
@endauth



















                       {{-- <div class="mb-3">
                            <label class="form-label">Client's Number</label>
                            <input type="text" name="clients_number" value="{{ $client->clients_number }}" class="borderless-input">
                        </div> --}}
                        {{-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Stall Number</th>
                                    <th class="text-center">Stall Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->stallNumber->stall_number }}</td>
                                    <td>{{ $client->stalltype->stall_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>












                        {{-- <div class="mb-3">
                            <label class="form-label">Full Name:</label>
                            <input type="text" name="full_name" value="{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}" class="borderless-input">
                        </div> --}}