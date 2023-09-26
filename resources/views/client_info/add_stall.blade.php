@extends('layout')

@section('content')
<div class="container">
    <h2>Add Stall for {{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('clients.storeStall', ['id' => $client->id]) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="stalltype_id" class="form-label">Select Stall Type</label>
            <select class="form-control" id="stalltype_id" name="stalltype_id" required>
                <option value="" disabled selected>Select Stall Type</option>
                @foreach ($stallTypes as $stallType)
                    <option value="{{ $stallType->id }}">
                        {{ $stallType->stall_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="stall_number_id" class="form-label">Select Stall Number</label>
            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                <option value="" disabled selected>Select Stall Number</option>
                @foreach ($stallNumbers as $stallNumber)
                    <option value="{{ $stallNumber->id }}">
                        {{ $stallNumber->stall_number }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Stall</button>
    </form>
</div>
@endsection
