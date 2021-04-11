@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Available Animals</div>
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
                                <th colspan="1"></th>
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
                                <!-- Show different text depending on if available or not -->
                                @if($animal->available)
                                    <td>Available</td>
                                @else
                                    <td>Unavailable</td>
                                @endif
                                <!-- Only show button for animals user has not requested -->
                                @if(App\Models\Request::animalIDUserID($animal->id, Auth::id())->exists())
                                    <td>Requested</td>
                                @else
                                    <td>
                                        <form method="POST" action="{{ route('request_adoption', ['id' => $animal['id']]) }}" enctype="multipart/form-data" >
                                            @method('PATCH')
                                            @csrf
                                            <input type="submit" class="btn btn-success" name="submitButton" value="Request Adoption" />
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