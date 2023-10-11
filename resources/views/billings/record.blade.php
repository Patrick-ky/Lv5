@extends('include.header')
@section('billing.record')

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center"><strong>Client Name</strong></th>
            <th class="text-center"><strong>Stall Type</strong></th>
            <th class="text-center"><strong>Monthly Rent</strong></th>
            <th class="text-center"><strong>Violations</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientinfos as $clientinfo)
        <tr>
            <td class="text-center">{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
            <td class="text-center">{{ $clientinfo->stallNumber->stallType->stall_name }}</td>
            <td class="text-center">₱{{ $clientinfo->stallNumber->stallType->price }}</td>
            <td class="text-center">
                @foreach($clientinfo->citations as $citation)
                    {{ $citation->violation->violation_name }} (₱{{$citation->violation->penalty_value}})
                    @if (!$loop->last)
                        <br>
                    @endif
                @endforeach
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
