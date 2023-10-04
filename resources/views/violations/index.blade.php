@auth
@extends('include.header')

@section('violations.index')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Violations List</h2>

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

            <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center">Violation Name</th>
                        <th class="text-center">Penalty</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($violations as $violation)
                    <tr>
                        <td class="text-center">{{ $violation->violation_name }}</td>
                        <td class="text-center">{{ $violation->penalty_value }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
 
        </div>
    </div>
</div>
@endsection
@endauth
