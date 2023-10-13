@extends('include.header')

@section('billing.record')
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center "><strong>Client Name</strong></th>
            <th class="text-center"><strong>Stall Code</strong></th>
            <th class="text-center"><strong>Owner Monthly</strong></th>
            <th class="text-center"><strong>Violations</strong></th>
            <th class="text-center"><strong>Overall Balance</strong></th>
        </tr>
    </thead>
    <tbody>
        @php
        $currentStallOwner = null; // To keep track of the current stall owner
        $totalFee = 0;
        @endphp
        @foreach($clientinfos as $clientinfo)
            <tr>
                <td class="text-center">{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
                <td class="text-center">{{ $clientinfo->stallNumber->nameforstallnumber }}</td>
                <td class="text-center">₱{{ $clientinfo->ownerMonthly }}</td> <!-- Updated this line -->
                <td class="text-center">
                    @php
                    $violationTotal = 0;
                    @endphp
                    @if ($clientinfo->stallType->citations->isNotEmpty())
                        @foreach($clientinfo->stallType->citations as $citation)
                            @if ($citation->violation)
                                <li> {{ $citation->violation->violation_name }} (₱{{ $citation->violation->penalty_value }})</li>
                                @php
                                $violationTotal += $citation->violation->penalty_value;
                                @endphp
                                @if (!$loop->last)
                                    <br>
                                @endif
                            @endif
                        @endforeach
                    @else
                        No Violations
                    @endif
                    @php
                    $totalFee += $clientinfo->ownerMonthly + $violationTotal; // Updated this line
                    @endphp
                </td>
                <td class="text-center">
                    ₱{{ $totalFee }}
                </td>
            </tr>
            @if ($currentStallOwner !== $clientinfo->stallNumber->nameforstallnumber)
                @php
                $currentStallOwner = $clientinfo->stallNumber->nameforstallnumber;
                $totalFee = 0; // Reset total fee for the next stall owner
                @endphp
            @endif
        @endforeach
    </tbody>
</table>
@endsection
