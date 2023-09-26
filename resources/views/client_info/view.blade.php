@extends('layout')

@section('client_info.view')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">

                <div class="mb-4">
                    <label class="form-label"><strong>Full Name:</strong> {{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</label>
                </div>

                <div class="mb-4">
                    <label class="form-label"><strong>Stalls Owned</strong></label>
                </div>

               <!-- Existing code... -->

<div class="table-responsive">
    <table class="table table-bordered custom-table">
        <thead>
            <tr>
                <th class="text-center">Stall Number</th>
                <th class="text-center">Stall Type</th>
                <th class="text-center">Landmark</th>
                <th class="text-center">Stall Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientInfos as $client)
            <tr>
                <td>{{ $client->stallNumber->stall_number }}</td>
                <td>{{ $client->stallType->stall_name }}</td>
                <td>{{ $client->stallNumber->description }}</td>
                <td>{{ $client->stallNumber->nameforstallnumber }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Existing code... -->


                {{-- Add any additional fields or form elements here if needed --}}
                
                <button type="submit" class="btn btn-primary">Update Client Info</button>
            </form>
        </div>
    </div>
</div>
<style>
    .th {
        width: 20%;
    }
</style>
@endsection
