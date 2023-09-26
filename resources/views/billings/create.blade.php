@auth
@extends('include.header')

@section('billings.create')
<style>
    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* This will center the form vertically on the screen */
    }

    .form-container {
        max-width: 500px;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
        <h4 class="text-center">Create a Billing</h4>

        <form action="{{ route('billing.store') }}" method="POST">
            @csrf
            @method('post')

            <div class="mb-3">
                <label for="client">Select Client:</label>
                <select name="client_id" id="client" class="form-control">
                    <option value="" disabled selected>Select a client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stalltype">Select Stall Type:</label>
                <select name="stalltype_id" id="stalltype" class="form-control">
                    <option value="" disabled selected>Select a Type of stall</option>
                    @foreach($stalltypes as $stalltype)
                        <option value="{{ $stalltype->id }}">{{ $stalltype->stall_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="stallnumber">Select Stall Number:</label>
                <select name="stall_number_id" id="stallnumber" class="form-control">
                    <option value="" disabled selected>Select a Stall Number</option>
                </select>
            </div>
            


            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-2"> <!-- Column for Save button and OR -->
                        <button type="submit" class="btn btn-primary btn-block">Save</button>
                    </div>
                    <div class="col-md-1"> <!-- Column for OR -->
                        <span class="or-text">OR</span>
                    </div>
                    <div class="col-md-2"> <!-- Column for Cancel button -->
                        <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href='/billingskie'">Cancel</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
</div>
        </div>
    </div>
</div>



@endsection
@endauth
