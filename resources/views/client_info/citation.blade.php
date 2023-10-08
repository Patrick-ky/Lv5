@extends('include.header')

@section('client_info.citation')
<style>
    
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2><strong>Violations on Stall: {{ $clientInfo->stallNumber->nameforstallnumber }}</strong></h2>
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
                <th class="text-center"><strong>Violation Name</strong></th>
                <th class="text-center"><strong>Penalty Price</strong></th>
                <th class="text-center"><strong>Date Acquired</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($citations as $citation)
            <tr>
                <td>{{ $citation->violation->violation_name }}</td>
                <td>{{ $citation->violation->penalty_value }}</td>
                <td>{{ $citation->start_date }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/script.js') }}"></script>
@endsection
