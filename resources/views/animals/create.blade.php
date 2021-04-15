<!-- inherit master template app.blade.php -->
@extends('layouts.app')

<!-- define the content section -->
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="centre">Add Animal</h1>
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
                    <form class="form-horizontal form-div" method="POST" action="{{ url('animals') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-8 form-label">
                            <label>Animal Name</label>
                            <br>
                            <input type="text" name="name" placeholder="Animal Name" />
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Date of Birth</label>
                            <br>
                            <input type="date" name="date_of_birth" placeholder="yyyy-mm-dd" />
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Type</label>
                            <br>
                            <select name="type" id="type">
                                <option value="" selected disabled hidden>Select the animal type</option>
                                <option value="mammal">Mammal</option>
                                <option value="bird">Bird</option>
                                <option value="reptile">Reptile</option>
                                <option value="amphibian">Amphibian</option>
                                <option value="fish">Fish</option>
                                <option value="invertebrate">Invertebrate</option>
                            </select>
                        </div>

                        <div class="col-md-8 form-label">
                            <label>Description</label>
                            <br>
                            <textarea rows="4" cols="55" name="description" placeholder="Description for the animal. Max 256 characters."></textarea>
                        </div>

                        <div style="margin-bottom:10px;" class="col-md-8 form-label">
                            <label>Image</label>
                            <br>
                            <input type="file" accept="image/*" name="image" placeholder="Image file"/>
                        </div>

                        <div class="col-md-12 col-md-offset-4">
                            <a href="{{ route('animals.index') }}" class="btn btn-pink" role="button">Back to the list</a>
                            <input style="margin-left:20%;" type="submit" class="btn btn-green"/>
                            <input style="margin-left:20%;" type="reset" class="btn btn-red" onclick="return confirm('Are you sure you want to reset the form?')"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection