@extends('include.header')

@section('client_info.index')

<style>
    .primary-button {
        background-color: #007bff; /* Primary button color (blue) */
        color: #fff; /* Text color for the button */
        padding: 10px 20px; /* Padding inside the button */
        border: none; /* Remove the button border */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        font-size: 16px; /* Font size */
    }

    .secondary-button {
        background-color: #fff; /* Secondary button color (white) */
        color: #007bff; /* Text color for the button (blue) */
        border: 2px solid #007bff; /* Border for the secondary button */
        padding: 10px 20px; /* Padding inside the button */
        border-radius: 5px; /* Rounded corners */
        cursor: pointer; /* Change cursor to pointer on hover */
        font-size: 16px; /* Font size */
    }

    /* Hover effect for both buttons */
    .primary-button:hover,
    .secondary-button:hover {
        opacity: 0.8; /* Reduce opacity on hover */
    }
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
            @php
                $prevClientName = null;
            @endphp
    
            @foreach ($clientInfoModels as $clientInfo)
                @if ($prevClientName !== $clientInfo->client->firstname . ' ' . $clientInfo->client->middlename . ' ' . $clientInfo->client->lastname)
                    <tr>
                        <td>{{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</td>
                        <td>
                            <a href="{{ route('client_info.view',['id' => $clientInfo->id]) }}" class="btn btn-primary"
                                data-toggle="modal" data-target="#editModal">View</a>

                        </td>
                    </tr>
                @endif
    

    
                @php
                    $prevClientName = $clientInfo->client->firstname . ' ' . $clientInfo->client->middlename . ' ' . $clientInfo->client->lastname;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg class for larger width -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel"><strong>Register Stall Owner</strong></h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addModalContent">

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg class for larger width -->

        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="editModalLabel"><strong>Stall Owner Information</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editModalContent">
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('js/script.js') }}"></script>
@endsection