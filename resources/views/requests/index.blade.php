@extends('layouts.app')

@section('columns', '10')
@section('title', 'All Adoption Requests')

@section('content')
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
                <th>@sortablelink('id', 'Request ID')</th>
                @if(Gate::allows('admin-functionality'))
                <th>Requester</th>
                @endif
                <th>Animal Name</th>
                <th>@sortablelink('created_at', 'Request Date')</th>
                <th>@sortablelink('adoption_status', 'Adoption Status')</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($requests as $request)
            <tr>
                <td>{{ $request->id }}</td>
                @if(Gate::allows('admin-functionality'))
                <td>{{ $request->user_name }}</td>
                @endif
                <td>{{ $request->animal_name }}</td>
                <td>{{ date("l jS \of F Y h:i A", strtotime($request->created_at)) }}</td>
                <td>{{ $request->adoption_status }}</td>
                <td>
                    <a href="{{ route('requests.show', ['request' => $request['id']]) }}" class="btn btn-blue">Details</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $requests->links() }}
@endsection