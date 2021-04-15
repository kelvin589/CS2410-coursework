@extends('layouts.app')

@section('content')
@section('columns', '12')

@section('title', 'Available Animals')
    @include('elements.select_animal_type')
    <table class="table table-striped table-bordered table-hover table-pink">
        <thead> 
            <tr>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('date_of_birth', 'Date of Birth')</th>
                <th>Description</th>
                <th>Type</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
                <td>{{ date("jS F Y", strtotime($animal->date_of_birth)) }}</td>
                <td width="42%">{{ $animal->description }}</td>
                <td>{{ $animal->type }}</td>
                <td>
                    <a href="{{ route('animals.show', ['animal' => $animal['id']]) }}" class="btn btn-blue">Details</a>
                </td>
                <!-- Only show button for animals user has not requested -->
                @if(App\Models\Request::animalIDUserID($animal->id, Auth::id())->exists())
                    <td>Requested</td>
                @else
                    <td>
                        <form method="POST" action="{{ route('request_adoption', ['id' => $animal['id']]) }}" enctype="multipart/form-data" >
                            @method('PATCH')
                            @csrf
                            <input type="submit" class="btn btn-green" name="submitButton" value="Request Adoption" />
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $animals->appends(\Request::except('page'))->render() }}
@endsection