@extends('layout')
@section('clients.addclients')

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

        <form action="{{ route('clientstore') }}" method="POST" class="mx-auto">
            @csrf

            <!-- First Name -->
            <div class="row mb-3">
                <div class="col-md-16">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
            </div>

            <!-- Middle Name -->
            <div class="row">
                <div class="col-md-16">
                    <div class="mb-3">
                        <label for="middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" required>
                    </div>
                </div>
            </div>

            <!-- Last Name -->
            <div class="row">
                <div class="col-md-16">
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
            </div>

            
            <!-- Birthdate -->
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="birthdate" class="form-label">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" required>
                    </div>
                </div>
            </div>
            

            <!-- Gender -->
            <div class="row">
                <div class="col-md-16">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Address -->
<br><br>
 <div class="row">
    <label for="gender" class="form-label">Address</label>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="purok" class="form-label">purok</label>
                                <input type="text" class="form-control" id="purok" name="purok" required>
                            </div>
                        </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="street" class="form-label">street</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                    </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="barangay" class="form-label">barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" required>
                    </div>
                </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="province" class="form-label">province</label>
                    <input type="text" class="form-control" id="province" name="province" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
            </div>
            
            <div class=" col-md-6">
                <div class="mb-3">
                    <label for="zipcode" class="form-label">zipcode</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                </div>
            </div>
            

                        <button type="submit" class="btn btn-primary">Add Client</button>
                    </form>
                </div>
            
        </div>
    </div>
</div




@endsection


