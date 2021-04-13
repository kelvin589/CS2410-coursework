@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1 class="centre">Pending Adoption Requests</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @elseif (session('failure'))
                <div class="alert alert-danger">
                    <p>{{ \Session::get('failure') }}</p>
                </div><br />
            @endif
            
            <table class="table table-striped table-bordered table-hover table-pink">
                <thead> 
                    <tr>
                        <th>Request ID</th>
                        <th>Animal Name</th>
                        <th>Request Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->animal_name }}</td>
                        <td>{{ date("l jS \of F Y h:i A", strtotime($request->created_at)) }}</td>
                        <td style="text-align: center;">
                            <form style="float:left; padding-left:10px; padding-right:10px;" method="POST" action="{{ route('update_request_status', ['id' => $request['id']]) }}" enctype="multipart/form-data" >
                                @method('PATCH')
                                @csrf
                                <a href="{{ route('requests.show', ['request' => $request['id']]) }}" class="btn btn-blue">Details</a>
                                
                                @if(Gate::allows('admin-functionality'))
                                    <input type="submit" class="btn btn-success" name="submitButton" value="Approve"/>
                                    <input type="submit" class="btn btn-danger" name="submitButton" value="Deny"/>
                                @endif
                            </form>
                            <form style="float:left; padding-left:10px; padding-right:10px; " action="{{ action([App\Http\Controllers\RequestController::class, 'destroy'], ['request' => $request['id']]) }}" method="post">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE"> 
                                <button class="btn btn-red" type="submit">Cancel</button>
                            </form> 
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection