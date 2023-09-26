
@include('include.loginregheader')

@section('registration')

<html>
<body>
<div class="container mt-5">
  <div class="col-12">
    @if($errors->any())
    <div class="col-12">
      @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
      @endforeach    
    </div>
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
  </div>

  <div class="row justify-content-center"> <!-- Center the form horizontally -->
    <form action="{{route('registration.p')}}" method="POST" style="width: 500px">
      @csrf

      <div class="card">
        <div class="card-header text-center font-weight-bold">Registration</div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label">Full name</label>
            <input type="text" class="form-control" name='name' placeholder="Enter Full Name">
          </div>
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name='email' placeholder="e.g : user@gmail.com">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
          <span class="text-muted">OR</span>
          <a href="{{ route('login') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
</html>


