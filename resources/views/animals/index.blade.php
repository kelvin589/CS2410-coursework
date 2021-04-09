@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Display all animals</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date of Birth</th>
                                <th>Availability</th>
                                <th>Adopted By</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($animals as $animal)
                                <tr>
                                    <td>{{ $animal['name']}}</td>
                                    <td>{{ $animal['date_of_birth']}}</td>
                                    @if($animal['available'])
                                        <td>Available</td>
                                    @else
                                        <td>Unavailable</td>
                                    @endif
                                    @if($animal['user_name'])
                                        <td>{{ $animal['user_name']}}</td>
                                    @else
                                        <td>Not Adopted</td>
                                    @endif
                                    <td>
                                        <a href="{{ route('animals.show', ['animal' => $animal['id']]) }}" class="btn btn-primary">Details</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal['id']]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE"> <button class="btn btn-danger" type="submit">Delete</button>
                                        </form> 
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