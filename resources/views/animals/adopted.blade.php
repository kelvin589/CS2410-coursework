@extends('layouts.app')

@section('content')
@section('columns', '8')

@section('title', 'Adopted Animals')
    @include('elements.select_animal_type')
    <table class="table table-striped table-bordered table-hover table-pink">
        <thead> 
            <tr>
                <th>@sortablelink('name', 'Name')</th>
                <th>@sortablelink('date_of_birth', 'Date of Birth')</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>{{ $animal->name }}</td>
                <td>{{ date("jS F Y", strtotime($animal->date_of_birth)) }}</td>
                <td>{{ $animal->type }}</td>
                <td>
                    <a href="{{ route('animals.show', ['animal' => $animal['id']]) }}" class="btn btn-blue">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $animals->appends(\Request::except('page'))->render() }}
@endsection