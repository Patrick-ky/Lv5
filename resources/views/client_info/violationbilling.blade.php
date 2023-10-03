@extends('include.header')

@section('client_info.violationbilling')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2><strong>Stall Owner Information:</strong></h2>
            
            <!-- Display client information -->
            Name: {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}<br>
            Contact Number: {{ $clientInfo->client->clients_number }}<br>
            Address: {{ $clientInfo->client->Address }}<br><br>
            
            <div class="row mt-5">
                <div class="col-md-12">
                    <h2><strong>Citations</strong></h2>
                    <div class="table-responsive">
                        <table class="table table-bordered custom-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Stall Number</th>
                                    <th class="text-center">Stall Code</th>
                                    <th class="text-center">Landmark</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientInfos as $client)
                                    <tr>
                                        <td>{{ $client->stallNumber->stall_number }}</td>
                                        <td>{{ $client->stallNumber->nameforstallnumber }}</td>
                                        <td>{{ $client->stallNumber->description }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- Report Button -->
                                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                    data-target="#reportViolationModal{{ $client->id }}">Report</button>
                                        
                                                <!-- Details Button -->
                                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#detailsViolationModal{{ $client->id }}"
                                                    data-stall-id="{{ $client->id }}">Details</button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals for Report and Details -->
@foreach ($clientInfos as $client)
    <!-- Report Violation Modal -->
    <div class="modal fade" id="reportViolationModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="reportViolationModalLabel{{ $client->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportViolationModalLabel{{ $client->id }}">Report Violation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reportViolationForm{{ $client->id }}">
                        @csrf
                        <div class="form-group">
                            <label for="violation_name{{ $client->id }}">Violation Name</label>
                            <input type="text" class="form-control" id="violation_name{{ $client->id }}" name="violation_name" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date{{ $client->id }}">Start Date</label>
                            <input type="date" class="form-control" id="start_date{{ $client->id }}" name="start_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Details Violation Modal -->
    <div class="modal fade" id="detailsViolationModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsViolationModalLabel{{ $client->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsViolationModalLabel{{ $client->id }}">Violations on stall :{{$client->stallNumber->nameforstallnumber }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your table and details here for viewing violation details -->
                    <!-- Example: -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Violation Name</th>
                                <th>Penalty Value</th>
                                <th>Start Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through violation details here -->
                            <!-- Example: -->
                            <tr>
                                <td>Violation Name 1</td>
                                <td>Penalty Value 1</td>
                                <td>Start Date 1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- JavaScript to Submit the Report Form via AJAX -->
<script>
    @foreach ($clientInfos as $client)
        $('#reportViolationForm{{ $client->id }}').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '{{ route('report.store') }}',
                data: $(this).serialize(),
                success: function (response) {
                    // Handle success, close the modal, or show a message
                    $('#reportViolationModal{{ $client->id }}').modal('hide');
                    alert('Report submitted successfully.');
                },
                error: function (error) {
                    // Handle errors and display validation messages
                    var errors = error.responseJSON.errors;
                    for (var key in errors) {
                        alert(errors[key][0]);
                    }
                }
            });
        });
    @endforeach
</script>
@endsection
