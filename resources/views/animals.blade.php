@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($animals as $animal)
                            <tr>
                                <td>{{ $animal->id }}</td>
                                <td>{{ $animal->name }}</td>
                                <td>{{ $animal->date_of_birth }}</td>
                                <td>{{ $animal->description }}</td>
                                <td>{{ $animal->image }}</td>
                                @if($animal->available)
                                    <td>Available</td>
                                @else
                                    <td>Unavailable</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection