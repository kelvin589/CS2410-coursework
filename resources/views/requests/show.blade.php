@extends('layouts.app')

@section('columns', '8')
@section('title', 'Request Details')

@section('content')
    <h3>User Request Details</h3>
    <table class="table table-striped table-bordered table-hover table-pink">
        <tr>
            <th>Request ID</th>
            <td>{{ $request['id'] }} </td>
        </tr>
        <tr>
            <th><b>User ID</th>
            <td>{{ $request['user_id'] }}</td>
        </tr>
        <tr>
            <th><b>Username</th>
            <td>{{ $request['user_name'] }}</td>
        </tr>
        <tr>
            <th><b>Name</th>
            <td>{{ $request['forename'] . ' ' . $request['surname'] }}</td>
        </tr>
        <tr>
            <th>Request Date</th>
            <td>{{ date("l jS \of F Y h:i A", strtotime($request->created_at)) }}</td>
        </tr>
        <tr>
            <th>Adoption Status</th>
            <td>{{ $request['adoption_status'] }}</td>
        </tr>
    </table>

    <h3>Animal Details</h3>
    <table class="table table-striped table-bordered table-hover table-pink">
        <tr>
            <th>Animal ID</th>
            <td>{{ $request['animal_id'] }} </td>
        </tr>
        <tr>
            <th>Animal Name</th>
            <td>{{ $request['animal_name'] }}</td>
        </tr>
        <tr>
            <th>Animal Type</th>
            <td>{{ $request['type'] }}</td>
        </tr>
        <tr>
            <th>Date of Birth</th>
            <td>{{ date("jS F Y", strtotime($request->date_of_birth)) }}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td width="70%">{{ $request['description'] }}</td>
        </tr>
        <tr> 
        <td colspan="2">
                <div id="imageCarousel" class="carousel slide" data-interval="false">
                    <div class="carousel-inner">
                        <!-- There must be one active carousel item -->
                        <div class="carousel-item active" style="height:360px;">
                            <img class="d-block w-100" src="{{ asset('storage/images/noimage.jpg') }}" alt="noimage.jpg">
                        </div>
                        @foreach(explode("|", $request->image) as $image)
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
        </tr>
    </table> 
@endsection