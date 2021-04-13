@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">Display request</div>
                <div class="card-body">
                    <table class="table table-striped" border="1" >
                        <tr>
                            <th>Request ID</th>
                            <td>{{ $request['id']}} </td>
                        </tr>
                        <tr>
                            <th><b>Username</th>
                            <td>{{$request['user_name']}}</td>
                        </tr>
                        <tr>
                            <th>Animal Name</th>
                            <td>{{$request['animal_name']}}</td>
                        </tr>
                        <tr>
                            <th>Adoption Status</th>
                            <td>{{ $request['adoption_status'] }}</td>
                        </tr>
                    </table>
                    
                    <table>
                        <tr>
                            <td>
                                <a href="{{route('requests.index')}}" class="btn btn-primary" role="button">Back to the list</a>
                            </td>
                        </tr>
                    </table> 
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection