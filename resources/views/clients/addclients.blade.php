@auth
    
@extends('layout')

@section('clients.addclients')

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

        <form action="{{ route('clientstore') }}" method="POST">
            @csrf
        
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="Age" name="Age" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" required>
            </div>
        
            <button type="submit" class="btn btn-primary">Add Client</button>
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
                        <div class="mb-3">
                            <label for="stall_number_id" class="form-label">Select Stall Number</label>
                            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                                <option value="">Select Stall Number</option>
                                @foreach ($stallnumbers as $stallnumber)
                                    <option value="{{ $stallnumber->id }}" data-stall-type="{{ $stallnumber->stall_type_id }}">
                                        {{ $stallnumber->stall_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="mb-3">
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
                        <div class="mb-3">
                            <label for="stall_number_id" class="form-label">Select Stall Number</label>
                            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                                <option value="">Select Stall Number</option>
                            </select>
                        </div> --}}

                        <!-- hidden input for storing transaction data -->
                        {{-- <input type="hidden" id="client_data" name="client_data" value=""> --}}







{{-- @push('scripts')
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
@endpush --}}