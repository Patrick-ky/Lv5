@auth
    
@include('include.session')
@extends('include.header')
@section('client_info.index')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Stall Owners' List</h2>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('client_info.add') }}" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add Stall Owner</a>
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
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">Client Name</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientInfoModels as $clientInfo)
                <tr>
                    <td>{{ $clientInfo->client->firstname }} {{ $clientInfo->client->middlename }} {{ $clientInfo->client->lastname }}</td>
                    <td>
                        <a href="{{ route('client_info.view', ['id' => $clientInfo->id]) }}" class="btn btn-primary" data-toggle="modal" data-target="#editModal">View</a>

                        <form action="{{ route('client_info.delete', ['id' => $clientInfo->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this client info?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg class for larger width -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalLabel">Add Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="addModalContent">
                <!-- Add your modal content here -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg class for larger width -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="editModalLabel">Stall Owner Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="editModalContent">
                <!-- Add your modal content here -->
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/script.js') }}"></script>
@endsection

@endauth
