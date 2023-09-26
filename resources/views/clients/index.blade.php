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
                <h2>Clients List</h2>
            </div>
            <div class="col-md-6 text-md-right">
                <a href="{{ route('clients.addclients') }}" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Client</a>
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
          <table class= "table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Full Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Gender</th>
                    <th class="text-center">Contact Number</th>
                    <th class="text-center">Address</th> <!-- Add Address column -->
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</td>
                        <td>{{ $client->age }}</td>
                        <td>{{ $client->gender }}</td>
                        <td>{{ $client->clients_number }}</td>
                        <td>{{ $client->address }}</td> <!-- Display Address -->
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
          </table><br><br>
          <br>
      </body>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Add Client</h4>
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
                    <h4 class="modal-title" id="editModalLabel">Edit Client</h4>
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
