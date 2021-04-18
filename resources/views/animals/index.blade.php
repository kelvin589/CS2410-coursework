@extends('layouts.app')

@section('columns', '11')
@section('title', 'All Animals')

@section('content')
    @include('elements.session_alerts')
    <form>
        @include('elements.select_animal_type', ['type' => old('type'), 'onchange' => 'this.form.submit()', 'showall' => true])
    </form>
    <table class="table table-striped table-bordered table-hover table-pink">
        <thead>
            <tr>
                <th>@sortablelink('id', 'ID')</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('date_of_birth', 'Date of Birth')</th>
                <th>Type</th>
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
                    <td>{{ $animal['type'] }}</td>
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
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-red" type="submit" onclick="return confirm('Are you sure you want to delete {{ $animal->name }}?')">Delete</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $animals->appends(\Request::except('page'))->render() }}
@endsection