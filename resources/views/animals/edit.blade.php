<!-- inherit master template app.blade.php -->
@extends('layouts.app')

<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="centre">Edit and Update Animal</h1>
            <!-- Display the errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li> 
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif

            <!-- Display the success status -->
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div>
                <br />
            @endif

            <div style="background-color:#FCD5CE" class="card">
                <!-- Define the form -->
                <div class="card-body">
                    <form class="form-horizontal form-div" method="POST" action="{{ route('animals.update', ['animal' => $animal['id']]) }}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="col-md-8 form-label">
                            <label>Animal Name</label>
                            <br>
                            <input type="text" name="name" value="{{ $animal->name }}">
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Date of Birth</label>
                            <br>
                            <input type="date" name="date_of_birth" value="{{ $animal->date_of_birth }}">
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Type</label>
                            <br>
                            <!-- Select does not have a value attribute. Must programatically change the value show. -->
                            @php
                                function checkType($selected_type, $animal_type) {
                                    return $selected_type==$animal_type->type ? 'selected' : '';
                                }
                            @endphp
                            <select name="type" id="type" value="{{ $animal->type }}">
                                <option value="" disabled hidden>Select the animal type</option>
                                <option {{ checkType('mammal', $animal) }} value="mammal">Mammal</option>
                                <option {{ checkType('bird', $animal) }} value="bird">Bird</option>
                                <option {{ checkType('reptile', $animal) }} value="reptile">Reptile</option>
                                <option {{ checkType('amphibian', $animal) }} value="amphibian">Amphibian</option>
                                <option {{ checkType('fish', $animal) }} value="fish">Fish</option>
                                <option {{ checkType('invertebrate', $animal) }} value="invertebrate">Invertebrate</option>
                            </select>
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Description</label>
                            <br>
                            <textarea rows="4" cols="55" name="description" placeholder="Description for the animal. Max 256 characters.">{{ $animal->description }}</textarea>
                        </div>

                        <div style="margin-bottom:10px;" class="col-md-8 form-label">
                            <label>Image</label>
                            <img style="width:100%;height:100%" src="{{ asset('storage/images/'.$animal->image)}}">
                            <br>
                            <input type="file" accept="image/*" name="image" placeholder="Image file" />
                        </div>

                        <div class="col-md-12 col-md-offset-4">
                            <a href="{{ url()->previous() }}" class="btn btn-pink" role="button">Back to the list</a>
                            <input style="margin-left:20%;" type="submit" class="btn btn-green"/>
                            <input style="margin-left:20%;" type="reset" class="btn btn-red" onclick="return confirm('Are you sure you want to discard the changes?')"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection