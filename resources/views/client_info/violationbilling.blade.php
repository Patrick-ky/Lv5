@extends('include.header')

@section('client_info.violationbilling')
<div class="container">
    <div class="row">
        <div class="col-md-20">
            <h2><strong>Stall Owner Information:</strong></h2>

            <!-- Display client information -->
            <p><strong>Name:</strong> {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</p>
            <p><strong>Contact Number:</strong> {{ $clientInfo->client->clients_number }}</p>
            <p><strong>Address:</strong> {{ $clientInfo->client->Address }}</p>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="col-md-20">
        <h2><strong>Stalls Owned:</strong></h2>
        <div>
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><strong>Stall Number</th>
                        <th class="text-center"><strong>Stall Code</th>
                        <th class="text-center"><strong>Landmark</th>
                        <th class="text-center"><strong>Citations</th>
                        <th class="text-center"><strong>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientInfos as $client)
                    <tr>
                        <td>{{ $client->stallNumber->stall_number }}</td>
                        <td>{{ $client->stallNumber->nameforstallnumber }}</td>
                        <td>{{ $client->stallNumber->description }}</td>
                        <td class="align-content-center">
                            <a href="{{ route('client_info.citation', ['id' => $clientInfo->id]) }}" type="button" class="btn btn-primary">View Violations</a>
                        </td>
                        <td class="align-content-center">
                            <a href="{{ route('client_info.report_citation_form', ['client_id' => $clientInfo->id, 'stall_number_id' => $client->stallNumber->id, 'stall_type_id' => $client->stallNumber->stall_type_id]) }}" type="button" class="btn btn-danger">Report Citation</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
