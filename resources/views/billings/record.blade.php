@extends('include.header')
@section('billing.record')

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center"><strong>Client Name</strong></th>
            <th class="text-center"><strong>Stall Code</strong></th>
            <th class="text-center"><strong>Stall Type</strong></th>
            <th class="text-center"><strong>Stall Type Price</strong></th>
            <th class="text-center"><strong>Violations</strong></th>
        </tr>
    </thead>
    <tbody>
        @foreach($clientinfos as $clientinfo)
        <tr>
            <td class="text-center">{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
            <td class="text-center">{{ $clientinfo->stallNumber->nameforstallnumber }}</td>
            <td class="text-center">{{ $clientinfo->stallType->stall_name }}</td>
            <td class="text-center">₱{{ $clientinfo->stallType->price }}</td>
            <td class="text-center">
                @if ($clientinfo->stallType->citations->isNotEmpty())
                    @foreach($clientinfo->stallType->citations as $citation)
                        @if ($citation->violation)
                            {{ $citation->violation->violation_name }} (₱{{ $citation->violation->penalty_value }})
                            @if (!$loop->last)
                                <br>
                            @endif
                        @endif
                    @endforeach
                @else
                    No Violations
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
