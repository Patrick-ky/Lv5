@extends('include.header')

@section('billing.record')
<div class="container mt-5">
    <a
    href="/home"
  
    class="btn btn-success btn-oblong pulsate" 
    style="background-color: #098309; color:
                             white; border: 2px solid 
                          #e7ece2;" >Back to Home</a><br><br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center"><strong>Stall Holder Name</strong></th>
                <th class="text-center"><strong>Contact Number</strong></th>
                <th class="text-center"><strong>Stall Code</strong></th>
                <th class="text-center"><strong>Monthly</strong></th>
                <th class="text-center"><strong>Violations</strong></th>
                <th class="text-center"><strong>Acquired Violation Price</strong></th>
                <th class="text-center"><strong>Due Date</strong></th>
                <th class="text-center"><strong>Overall Balance</strong></th>
            </tr>
        </thead>
        <tbody>
            @php
            $currentStallOwner = null; // para makita kinsay stall holder
            $totalFee = 0;
            @endphp
            @foreach($clientinfos as $clientinfo)
                <tr>
                    <td class="text-center">{{ $clientinfo->client->firstname }} {{ $clientinfo->client->lastname }}</td>
                    <td class="text-center">{{ $clientinfo->client->clients_number}}</td>
                    <td class="text-center">{{ $clientinfo->stallNumber->nameforstallnumber }}</td>
                    <td class="text-center">₱{{ $clientinfo->ownerMonthly }}</td>
                    <td class="text-center">
                        @php
                        $violationTotal = 0;
                        @endphp
                        @if ($clientinfo->stallType->citations->isNotEmpty())
                            @foreach($clientinfo->stallType->citations as $citation)
                                @if ($citation->violation)
                                    <li>{{ $citation->violation->violation_name }} {{ $citation->acquiredviolationprice }}</li>
                                @endif
                            @endforeach
                        @else
                            No Violations
                        @endif
                        @php
                        $totalFee += $clientinfo->ownerMonthly + $violationTotal;
                        @endphp
                    </td>
                    <td class="text-center">
                        @php
                        $acquiredViolationPrice = $clientinfo->stallType->citations->sum('acquiredviolationprice');
                        @endphp
                        ₱{{ $acquiredViolationPrice }}
                    </td>
                    <td class="text-center">
                           {{ $clientinfo->due_date }} 
                    </td>
                    <td class="text-center">
                        ₱{{ $totalFee }}
                    </td>
                </tr>
                @if ($currentStallOwner !== $clientinfo->stallNumber->nameforstallnumber)
                    @php
                    $currentStallOwner = $clientinfo->stallNumber->nameforstallnumber;
                    $totalFee = 0;
                    @endphp
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
