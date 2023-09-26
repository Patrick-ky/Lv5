@extends('include.header')

@section('stall-types.edit')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" >

<style>
    table {
        border: 1px solid black;
        width: 100%; /* Use full width */
        border-collapse: collapse; /* Merge adjacent borders */
    }

    th, td {
        border: 1px solid black;
        padding: 8px; /* Add some padding for better spacing */
        text-align: center; /* Center-align content */
    }
</style>
<div class="container">
    <div class="row justify-content-center align-items-center"> <!-- Center the form horizontally and vertically -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">

    <h4>Edit Stall Type</h4>

    {{-- Display a form to edit the stall type here --}}
    <form method="POST" action="{{ route('stall-types.update', $stalltype->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
        <label for="stall_name">Stall Name</label>
        <input type="text" name="stall_name" id="stall_name" value="{{ $stalltype->stall_name }}" required>
        </div>
        <div class="mb-3">
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ $stalltype->price }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection
