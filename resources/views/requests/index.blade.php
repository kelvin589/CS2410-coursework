@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pending Adoption Requests</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr>
                                <th>Username</th>
                                <th>Animal Name</th>
                                <th>Adoption Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->user_name }}</td>
                                <td>{{ $request->animal_name }}</td>
                                <td>{{ $request->adoption_status }}</td>
                                <td>
                                    <a href="" class="btn btn-success">Approve</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger">Deny</a>
                                </td>
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