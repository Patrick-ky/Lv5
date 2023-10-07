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
                        <a href="{{ route('violationbilling', ['client_id' => $clientInfo->id]) }}" class="btn btn-primary">View</a>
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
            </div>
        </div>
    </div>
</div>



<script src="{{ asset('js/script.js') }}"></script>
@endsection