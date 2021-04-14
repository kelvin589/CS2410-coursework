@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="centre">All Animals</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif

            <table class="table table-striped table-bordered table-hover table-pink">
                <thead>
                    <tr>
                        <th>@sortablelink('id', 'ID')</th>
                        <th>@sortablelink('name', 'Name')</th>
                        <th>@sortablelink('date_of_birth', 'Date of Birth')</th>
                        <th>@sortablelink('available', 'Availability')</th>
                        <th>Adopted By</th>
                        <th colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($animals as $animal)
                        <tr>
                            <td>{{ $animal['id'] }}</td>
                            <td>{{ $animal['name'] }}</td>
                            <td>{{ date("jS F Y", strtotime($animal['date_of_birth'])) }}</td>
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
                                <a href="{{ route('animals.show', ['animal' => $animal['id']]) }}" class="btn btn-blue">Details</a>
                            </td>
                            <td>
                                <a href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btn-yellow">Edit</a>
                            </td>
                            <td>
                                <form action="{{ action([App\Http\Controllers\AnimalController::class, 'destroy'], ['animal' => $animal['id']]) }}" method="post">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE"> <button class="btn btn-red" type="submit" onclick="return confirm('Are you sure you want to delete {{ $animal->name }}?')">Delete</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $animals->links() }}
        </div>
    </div>
</div>
@endsection