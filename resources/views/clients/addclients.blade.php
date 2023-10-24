@extends('include.header')
@section('clients.addclients')
<style>
    @keyframes slide-up {
   0% {
     transform: translateY(35%);
     opacity: 0;
   }
   100% {
     transform: translateY(0);
     opacity: 1;
   }
 }

 /* Maaply ang animation na ma slide up ang content*/
 .slide-up-content {
   animation: slide-up 0.5s ease-in-out; /* Adjust the duration and timing function as needed */
 }
   table {
       border: 1px solid black;
       width: 100%; /* Use full width */
       border-collapse: collapse; /* Merge adjacent borders */
   }

   th, td {
       border: 1px solid black;
       padding: 2px; /* Add some padding for better spacing */
       text-align: center; /* Center-align content */
   }
</style>
<div class="container ml-5">
<a
href="/home"

class="btn btn-success btn-oblong pulsate " 
style="background-color: #098309; color:
                         white; border: 2px solid 
                      #e7ece2;" >Back to Home</a></div>
                      <br><br>
<div class="container ml-5">
<h1 style="color: rgb(159, 248, 118)"><strong>Stall Holder Registration</strong></h1>
</div><br>
<div class="slide-up-content">
    
<div class="container md-9">
    <div class="card">
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
        
    <div class="container">
        <form action="{{ route('clientstore') }}" method="POST" class="mx-auto">
            @csrf
            <label class="form-label text-center" ><strong>Basic Information:</strong></label>
            <!-- First Name -->
            <div class="row mb-3">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="firstname" class="form-label text-dark">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                </div>
            </div>

            <!-- Middle Name -->
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="middlename" class="form-label text-dark">Middle Name</label>
                        <input type="text" class="form-control" id="middlename" name="middlename" required>
                    </div>
                </div>
            </div>

            <!-- Last Name -->
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="lastname" class="form-label text-dark">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                </div>
            </div>

            
            <!-- Birthdate -->
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="birthdate" class="form-label text-dark">Birthdate</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="clients_number" class="form-label text-dark">Contact Number</label>
                        <input type="text" class="form-control" id="clients_number" name="clients_number" required placeholder="+63">
                    </div>
                </div>
                
            

            <!-- Gender -->
            <div class="row">
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="gender" class="form-label text-dark ">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                </div>
            </div>
<br><br>
            <!-- Address -->

 <div class="row">
    <label  class="form-label text-capitalize" ><strong>Address:</strong></label>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="purok" class="form-label text-dark">Purok</label>
                                <input type="text" class="form-control" id="purok" name="purok" required>
                            </div>
                        </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="street" class="form-label text-dark">Street</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                    </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="barangay" class="form-label text-dark">Barangay</label>
                        <input type="text" class="form-control" id="barangay" name="barangay" required>
                    </div>
                </div>
            
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="province" class="form-label text-dark">Province</label>
                    <input type="text" class="form-control" id="province" name="province" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="city" class="form-label text-dark">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
            </div>
            
            <div class=" col-md-6">
                <div class="mb-3">
                    <label for="zipcode" class="form-label text-dark">Zipcode</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                </div>
            </div>
            
 </div>
 <br>
                       
 </div><button type="submit" class="btn btn-success">Save</button>
             </form>
                </div>
            
        </div>
    </div>
</div>

</div>



@endsection


