@extends('include.header')

@section('clientrecords.index')
    <div class="container">
        <h1>Client Records</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client Name</th>
                    <th>Stall Type</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientRecords as $record)
                    <tr>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->client->name }}</td>
                        <td>{{ $record->stallType->name }}</td>
                        <td>{{ $record->description }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
