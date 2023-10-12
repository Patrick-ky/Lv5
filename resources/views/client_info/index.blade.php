    @extends('include.header')

    @section('client_info.index')
    <style>
        /* Your CSS styles here */
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2><strong>Stall Owners' Profile</strong></h2>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('client_info.add') }}" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Stall Owner</a>
            </div>
        </div>

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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center"><strong>Client Name</strong></th>
                    <th class="text-center"><strong>Actions</strong></th>
                </tr>
            </thead>
            <tbody>
                @foreach($groupedData as $clientName => $clientInfo)
                    <tr>
                        <td>{{ $clientName }}</td>
                        <td>
                            <a href="{{ route('client_info.violationbilling', ['id' => $clientInfo->id]) }}" class="btn btn-primary">View</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel"><strong>Register Stall Owner</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="addModalContent">
                    <form action="{{ route('client_info.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="stalltype_id" class="form-label">Select Client</label>
                            <select class="form-control" id="client_id" name="client_id" required>
                                <option value="" disabled selected>Select Client</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">
                                        {{ $client->firstname }} {{ $client->lastname }} {{ $client->middlename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="stall_type_id" class="form-label">Stall Type</label>
                            <select class="form-control" id="stall_type_id" name="stall_type_id" required>
                                <option value="" disabled selected>Select Stall Type</option>
                                @foreach ($stalltypes as $stalltype)
                                    <option value="{{ $stalltype->id }}">
                                        {{ $stalltype->stall_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-2">
                            <label for="stall_number_id" class="form-label">Stall Number</label>
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
                
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Stalltype change event
            $('#stall_type_id').change(function () {
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