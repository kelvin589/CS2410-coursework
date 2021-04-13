@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="centre">Request Details</h1>
            <table class="table table-striped table-pink">
                <tr>
                    <th>Request ID</th>
                    <td>{{ $request['id'] }} </td>
                </tr>
                <tr>
                    <th><b>Username</th>
                    <td>{{ $request['user_name'] }}</td>
                </tr>
                <tr>
                    <th>Request Date</th>
                    <td>{{ date("l jS \of F Y h:i A", strtotime($request->created_at)) }}</td>
                </tr>
                <tr>
                    <th>Adoption Status</th>
                    <td>{{ $request['adoption_status'] }}</td>
                </tr>
                <tr>
                    <th>Animal Name</th>
                    <td>{{ $request['animal_name'] }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td width="70%">{{ $request['description'] }}</td>
                </tr>
                <tr>
                    <th>Date of Birth</th>
                    <td>{{ date("jS F Y", strtotime($request->date_of_birth)) }}</td>
                </tr>
                <tr> 
                    <td colspan='2'>
                        <img style="width:100%;height:100%" src="{{ asset('storage/images/'.$request->image) }}">
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
        </div>
    </div>
</div>
@endsection