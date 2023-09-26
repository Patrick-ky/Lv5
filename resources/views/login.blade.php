@extends('include.loginregheader')
@section('login')
<div class="container mt-5">
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

    <form action="{{route('login.p')}}" method="POST" style="max-width: 500px; margin: 0 auto;">
        @csrf
        <div class="card">
            <div class="card-header text-center font-weight-bold">Login</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" placeholder="e.g : user@gmail.com">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <span class="text-muted">OR</span>
                <a class="btn btn-secondary" href="/registration">Register</a>
            </div>
        </div>
    </form>
</div>
@endsection