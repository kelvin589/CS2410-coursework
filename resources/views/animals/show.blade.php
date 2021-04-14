@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <h1 class="centre">Animal Details</h1>
            <table class="table table-striped table-bordered table-hover table-pink">
                <tr>
                    <th>ID</th>
                    <td> {{ $animal['id'] }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td> {{ $animal['name'] }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ date("jS F Y", strtotime($animal['date_of_birth'])) }}</td>
                </tr>
                <tr>
                    <th>Availability</th>
                    @if($animal['available'])
                        <td>Available</td>
                    @else
                        <td>Unavailable</td>
                    @endif
                </tr>
                <tr>
                    <th>Adopted By</th>
                    <td>{{ $username }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td style="width:70%;">{{ $animal['description'] }}</td>
                </tr>
                <tr> 
                    <td colspan='2'>
                        <img style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}">
                    </td>
                </tr>
            </table>
            
            <table>
                <tr>
                    <td>
                        <a href="{{ route('animals.index') }}" class="btn btn-pink" role="button">Back to the list</a>
                    </td>
                    <td style="padding-left:10px;">
                        <a  href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btn-yellow">Edit</a>
                    </td>
                    <td style="padding-left:10px;">
                        <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-red" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            </table> 
        </div>
    </div>
</div>
@endsection