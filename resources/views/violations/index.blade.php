@auth
@extends('include.header')

@section('violations.index')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2><strong>Violations</h2>

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

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><strong>Violation Name</th>
                        <th class="text-center"><strong>Penalty</th>
                        <th class="text-center"><strong>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($violations as $violation)
                    <tr>
                        <td class="text-center">{{ $violation->violation_name }}</td>
                        <td class="text-center">{{ $violation->penalty_value }}</td>
                        <td class="text-center">
                            <a href="{{ route('violation.edit', $violation->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('violation.destroy', $violation->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this violation?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <br>
            <form action='/create-violation' method="GET">
                <button type="submit" class="btn btn-primary">Create new Violation</button>
            </form>
        </div>
    </div>
</div>
@endsection
@endauth
