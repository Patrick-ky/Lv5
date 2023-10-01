@extends('include.header')

@section('client_info.violationbilling')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Display client information here -->
            <h2><strong>Stall Owner Information:</strong></h2>
            <ul>             
                <li>Name: {{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</li>
                <li>Contact Number: {{ $client->clients_number }}</li>
                <li>Address: {{ $client->Address }}</li>    
            </ul>
            
     
            <button
            type="button"
            class="btn btn-danger"
            data-toggle="modal"
            data-target="#addViolationModal"
            data-client-id="{{ $client->id }}" 
        >
            Report Violation
        </button>
        
        
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <h2><strong>Citations</strong></h2>
                @if ($BillandViolations->isEmpty())
                    <p>None</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center"><strong>Stall Code</strong></th>
                                <th class="text-center"><strong>Landmark</strong></th>
                                <th class="text-center"><strong>Violation</strong></th>
                                <th class="text-center"><strong>Citation Date</strong></th>
                                <th class="text-center"><strong>Penalty Price</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($BillandViolations as $citation)
                                <tr>
                                    <!-- Display citation data in table rows -->
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>TOTAL:</td>
                                <td>0.00</td>
                            </tr>
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Add Violation Modal -->
<div class="modal fade" id="addViolationModal" tabindex="-1" role="dialog" aria-labelledby="addViolationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addViolationModalLabel"><strong>Add Citation for: {{ $client->firstname}} {{ $client->middlename }} {{ $client->lastname }}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your add violation form content goes here -->
                <form action="{{ route('storeViolation', ['client_id' => $client->id]) }}" method="POST">
                    @csrf
            
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
                    

                                     
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-2">
                                            <label for="stalltype_id" class="form-label">Select Stall Type</label>
                                            <select class="form-control" id="stalltype_id" name="stalltype_id" required>
                                                @foreach ($stallTypes as $stallType)
                                                    <option value="{{ $stallType->id }}">{{ $stallType->stall_name }}</option>
                                                @endforeach
                                            </select>
                                        </div><br>
                                        <div class="mb-2">
                                            <label for="stall_number_id" class="form-label">Select Stall Number</label>
                                            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                                            </select>
                                        </div><br>
                                        <div class="mb-2">
                                            <label for="violation_id" class="form-label">Select Violation</label>
                                            <select class="form-control" id="violation_id" name="violation_id" required>

                                            </select>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="start_date" class="form-label">Date of Violation</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                                        </div><br>
                                        <button type="submit" class="btn btn-primary">Add Violation</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function () {
    // Event listener for the stall type dropdown change event
    $('#stalltype_id').on('change', function () {
        var selectedStallType = $(this).val();

        // Make an AJAX request to fetch stall numbers based on the selected stall type
        $.ajax({
            url: '{{ route('getStallNumbersByStallType') }}',
            method: 'POST',
            data: {
                '_token': '{{ csrf_token() }}',
                'stalltype_id': selectedStallType,
                'client_id': {{ $client->id }} // Pass the client_id to filter stall numbers
            },
            success: function (data) {
                // Populate the stall number dropdown with the received data
                var stallNumberDropdown = $('#stall_number_id');
                stallNumberDropdown.empty();

                // Add an option for each stall number
                $.each(data.stallNumbers, function (key, value) {
                    stallNumberDropdown.append($('<option></option>').attr('value', value.id).text(value.stall_number));
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});
                    </script>
                    
                

            </div>
        </div>
    </div>
</div>

@endsection
