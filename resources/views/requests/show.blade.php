@extends('layouts.app')

@section('columns', '8')
@section('title', 'Request Details')
@include('elements.session_alerts')

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
                @include('elements.carousel', ['item' => $request])
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