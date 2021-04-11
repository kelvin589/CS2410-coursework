@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                @if($showAction)
                <div class="card-header">Pending Adoption Requests</div>
                @else
                <div class="card-header">All Adoption Requests</div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div><br />
                    @elseif (session('failure'))
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('failure') }}</p>
                        </div><br />
                    @endif
                    
                    <table class="table table-striped table-bordered table-hover">
                        <thead> 
                            <tr>
                                <th>Request ID</th>
                                <th>Username</th>
                                <th>Animal Name</th>
                                <th>Adoption Status</th>
                                @if($showAction)
                                    <th colspan="3">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($requests as $request)
                            <tr>
                                <td>{{ $request->id }}</td>
                                <td>{{ $request->user_name }}</td>
                                <td>{{ $request->animal_name }}</td>
                                <td>{{ $request->adoption_status }}</td>
                                @if($showAction)
                                <td>
                                    <form method="POST" action="{{ route('update_request_status', ['id' => $request['id']]) }}" enctype="multipart/form-data" >
                                        @method('PATCH')
                                        @csrf
                                        <input type="submit" class="btn btn-success" onclick="approve()" name="submitButton" value="Approve" />
                                        <input type="submit" class="btn btn-danger" onclick="deny()" name="submitButton" value="Deny"/>
                                    </form>
                                </td>
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