@extends('include.header')
@section('stall-number.index')

<style>
    table {
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: center;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Stalls</h1><br>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Stall Number</th>
                        <th>Name for Stall Number</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stallNumbers as $stallNumber)
                        <tr>
                            <td>{{ $stallNumber->stall_number }}</td>
                            <td>{{ $stallNumber->nameforstallnumber }}</td>
                            <td>{{ $stallNumber->description }}</td>
                            <td>{{ $stallNumber->status }}</td>
                            <td>
                                <a href="" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $stallNumbers->links() }}
        </div>
    </div>
</div>

@endsection
