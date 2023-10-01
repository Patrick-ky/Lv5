@extends('include.header')

@section('billings.index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-dark"><strong>Billings</strong></h2>

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
                        <th class="text-center"><strong>Full Name</strong></th>
                        <th class="text-center"><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupedData as $clientName => $data)
                    <tr>
                        <td class="text-center">
                            <strong>{{ $clientName }}</strong>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#billingModal{{ $data['client']->id }}">View</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($groupedData as $clientName => $data)
<!-- Billing Detail Modal -->
<div class="modal fade" id="billingModal{{ $data['client']->id }}" tabindex="-1" role="dialog" aria-labelledby="billingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="billingModalLabel"><strong>Billing Details for : {{ $clientName }}</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Stall Category</th>
                        <th>Stall Code</th>
                        <th>Due Date</th>
                        <th>Monthly</th>
                    </tr>
                    @foreach($data['stalls'] as $stall)
                    <tr>
                        <td>{{ $stall['stallType']->stall_name }}</td>
                        <td>{{ $stall['stallNumber']->nameforstallnumber }}</td>
                        <td>{{ \Carbon\Carbon::parse($stall['due_date'])->format('F j, Y') }}</td>
                        <td>₱{{ $stall['price'] }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
