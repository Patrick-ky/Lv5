@extends('include.header')


@section('client_info.violationbilling')

<style>


    h2 strong {
    margin-right: 15px; /* Adjust the margin as needed to create the desired spacing */
}
</style>

<div class="container">
    <div class="row">
        <body>     
        <div>

            <h2><strong><br><br>Stall Owner Information:</strong></h2>
            <ul>
        Name:                 <br>
        Contact Number:       <br>
        Address:
            </ul>
    </div>    
            
    <br>
    <br>
    <br>

    <div class="container"><br><br>
        <div class="row">
            <div class="col-md-8">
                <h2><strong>Citations</strong></h2>
            </div>
            <div class="col-md-4 text-right">
                <a href="/client_info/violationbilling" class="btn btn-danger">Report Violation</a>
            </div>
        </div>
    </div>
<table class= "table">

  <thead>
    <th class="text-center"><strong>Stall Code</strong></th>
    <th class="text-center"><strong>Landmark</strong> </th>
    <th class="text-center"><strong>Violation</strong></th>
    <th class="text-center"><strong>Citation Date</strong></th>
    <th class="text-center"><strong>Penalty Price</strong></th>
    
    

</thead>

<thead>

    <tr>
        <td>None</td>
        <td>None</td>
        <td>None</td>
        <td>None</td>
        <td>None</td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>TOTAL: </td>
        <td>0.00</td>
    </tr>
    
</thead>                   
</tbody>              
</table>

@endsection

{{-- @section('client_info.violationbilling')
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjust the column size to your preference -->
            <div class="card"> <!-- Add card class for a box container -->
                <div class="card-header text-center">
                    <h4>Register Stall Owner: ::name::'s Violation</h4>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="stalltype_id" class="form-label">Select Stall Type</label>
                            <select class="form-control" id="stalltype_id" name="stalltype_id" required>
                                <option value="" disabled selected>Select Stall Type</option>
                            </select>
                        </div><br>
                        <div class="mb-2">
                            <label for="stall_number_id" class="form-label">Select Stall Number</label>
                            <select class="form-control" id="stall_number_id" name="stall_number_id" required>
                                <option value="" disabled selected>Select Stall Number</option>
                            </select>
                        </div><br>
                        <div class="mb-2">
                            <label for="violation_id" class="form-label">Select Violation</label>
                            <select class="form-control" id="violation_id" name="violation_id" required>
                                <option value="" disabled selected>Select Violation</option>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="start_date" class="form-label">Date of Violation</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Add Client Info and Violation</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}