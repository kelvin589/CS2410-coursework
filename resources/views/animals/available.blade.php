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

            <div>
                <form>
                    <!-- Select does not have a value attribute. Must programatically change the value show. -->
                    @php
                        function checkType($selected_type, $old_type) {
                            return $selected_type==$old_type ? 'selected' : '';
                        }
                    @endphp
                    <select name="type" id="type" onchange='this.form.submit()'>
                        <option value="" selected disabled hidden>Select the animal type</option>
                        <option {{ checkType('all', old('type')) }} value="all">All</option>
                        <option {{ checkType('mammal', old('type')) }} value="mammal">Mammal</option>
                        <option {{ checkType('bird', old('type')) }} value="bird">Bird</option>
                        <option {{ checkType('reptile', old('type')) }} value="reptile">Reptile</option>
                        <option {{ checkType('amphibian', old('type')) }} value="amphibian">Amphibian</option>
                        <option {{ checkType('fish', old('type')) }} value="fish">Fish</option>
                        <option {{ checkType('invertebrate', old('type')) }} value="invertebrate">Invertebrate</option>
                    </select>
                </form>
            </div>

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