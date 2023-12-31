@extends('include.header')
@include('include.session')
{{-- @section('title', 'Clients') --}}
@section('clients.index')
@auth
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
  <div class="row">
      <body>
          <div class="row">
            <div class="col-md-6">
                <h2><strong>Stall Owners Profile</strong></h2>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('clients.addclients') }}" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Register Stall Owner</a>
            </div>
        </div>
          @if(session('success'))
          <div class="alert alert-success"> `
              {{ session('success') }}
          </div>
          @endif
      
          @if(session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
          @endif
          
          @if(count($clients) > 0) <!-- Check if there are any clients -->
              <table class= "table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><strong>Full Name</th>
                        <th class="text-center"><strong>Birthdate</th>
                        <th class="text-center"><strong>Gender</th>
                        <th class="text-center"><strong>Contact Number</th>
                        <th class="text-center"><strong>Address</th>
                        <th class="text-center"><strong>City</th>
                        <th class="text-center"><strong>Zip Code</th>
                        <th class="text-center"><strong>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td><strong>{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</td>
                            <td><strong>{{ $client->birthdate }}</td>
                            <td><strong>{{ $client->gender }}</td>
                            <td><strong>{{ $client->clients_number }}</td>
                            <td><strong>{{ $client->purok}} {{ $client->street }} {{ $client->barangay }}</td>
                            <td><strong>{{ $client->city }} of {{ $client->province }}</td>
                            <td><strong>{{ $client->zipcode }}</td>
                            <td>
                                <a href="{{ route('clients.editclient', ['id' => $client->id]) }}" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit</a>
                                {{-- deletefunctionlangsuah --}}
                                <form action="{{ route('deleteClient', ['id' => $client->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>              
              </table>
          @else
              <p>No Stall Owners Recorded</p> <!-- Display this message when no clients are available -->
          @endif
          
          <br><br>
          <br>
      </body>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Stall Owner Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="addModalContent">
                </div>
            </div>
        </div>
    </div>
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Edit Stall Owner Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editModalContent">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
      </html>

@endauth
@endsection
