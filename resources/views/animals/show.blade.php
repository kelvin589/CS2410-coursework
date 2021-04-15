@extends('layouts.app')

@section('columns', '8')
@section('title', 'Animal Details')

@section('content')
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
            <th>Type</th>
            <td>{{ $animal['type'] }}</td>
        </tr>
        @if(Gate::allows('admin-functionality'))
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
        @endif
        <tr>
            <th>Description</th>
            <td style="width:70%;">{{ $animal['description'] }}</td>
        </tr>
        <tr> 
            <td colspan="2">
                <div id="imageCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <!-- There must be one active carousel item -->
                        <div class="carousel-item active" style="height:360px;">
                            <img class="d-block w-100" src="{{ asset('storage/images/noimage.jpg') }}" alt="noimage.jpg">
                        </div>
                        @foreach(explode("|", $animal->image) as $image)
                        <div class="carousel-item " style="height:360px;">
                            <img class="d-block w-100" src="{{ asset('storage/images/'.$image) }}" alt="{{ $image }}">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </td>
        </tr>
    </table>
    
    <table>
        <tr>
            <td>
                <a href="{{ url()->previous() }}" class="btn btn-pink" role="button">Back to the list</a>
            </td>
            @if(Gate::allows('admin-functionality'))
            <td style="padding-left:10px;">
                <a  href="{{ route('animals.edit', ['animal' => $animal['id']]) }}" class="btn btn-yellow">Edit</a>
            </td>
            <td style="padding-left:10px;">
                <form action="{{ route('animals.destroy', ['animal' => $animal['id']]) }}" method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-red" type="submit" onclick="return confirm('Are you sure you want to delete {{ $animal->name }}?')">Delete</button>
                </form>
            </td>
            @endif
        </tr>
    </table> 
@endsection