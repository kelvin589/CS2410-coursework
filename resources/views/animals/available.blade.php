@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="centre">Available Animals</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

            <table class="table table-striped table-bordered table-hover table-pink">
                <thead> 
                    <tr>
                        <th>@sortablelink('name', 'Name')</th>
                        <th>@sortablelink('date_of_birth', 'Date of Birth')</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Image</th>
                        <th>Action</th>
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
                            <img style="height:25%" src="{{ asset('storage/images/'.$animal->image)}}">
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
            {{ $animals->links() }}
        </div>
    </div>
</div>
@endsection