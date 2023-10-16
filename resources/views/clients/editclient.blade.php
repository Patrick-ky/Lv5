@extends('layout')

@section('clients.edit')
<div class="container">
    <div class="card-body">
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

        <form action="{{ route('updateClient', ['id' => $client->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- First Name -->
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $client->firstname }}" required>
            </div>
            
            <!-- Middle Name -->
            <div class="mb-3">
                <label for="middlename" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middlename" name="middlename" value="{{ $client->middlename }}" required>
            </div>

            <!-- Last Name -->
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $client->lastname }}" required>
            </div>

            <!-- Birthdate and Contact Number -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="Age" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="Age" name="Age" value="{{ $client->Age }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" value="{{ $client->clients_number }}" required>
                    </div>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="" disabled selected>Select Gender</option>
                    <option value="Male" {{ $client->gender === 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $client->gender === 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Address Fields -->
            <div class="mb-3">
                <label class="form-label">Address</label>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="purok" class="form-label">Purok</label>
                        <input type="text" class="form-control" id="purok" name="purok" value="{{ $client->purok }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="street" class="form-label">Street</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ $client->street }}" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="barangay" class="form-label">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" value="{{ $client->barangay }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ $client->province }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $client->city }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="zipcode" class="form-label">Zipcode</label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $client->zipcode }}" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Client</button>
        </form>
    </div>
</div>
</div>

@endsection
