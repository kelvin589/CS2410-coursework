<!-- inherit master template app.blade.php -->
@extends('layouts.app')

@section('columns', '6')
@section('title', 'Edit and Update Animal')

<!-- define the content section -->
@section('content')
    <div style="background-color:#FCD5CE" class="card">
        <!-- Define the form -->
        <div class="card-body">
            <form class="form-horizontal form-div" method="POST" action="{{ route('animals.update', ['animal' => $animal['id']]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="col-md-8 form-label">
                    <label>Animal Name</label>
                    <br />
                    <input type="text" name="name" value="{{ $animal->name }}">
                </div>

                <div class="col-md-8 form-label">
                    <label>Date of Birth</label>
                    <br />
                    <input type="date" name="date_of_birth" value="{{ $animal->date_of_birth }}">
                </div>

                <div class="col-md-8 form-label">
                    <label>Type</label>
                    <br />
                    @include('elements.select_animal_type')
                </div>

                <div class="col-md-8 form-label">
                    <label>Description</label>
                    <br />
                    <textarea rows="4" cols="55" name="description" placeholder="Description for the animal. Max 256 characters.">{{ $animal->description }}</textarea>
                </div>

                <div style="margin-bottom:10px;" class="col-md-12 form-label">
                    <label>Image</label>
                    <br />
                    <input type="file" accept="image/*" name="images[]" placeholder="Image file" multiple/>
                    <div id="imageCarousel" class="carousel slide" data-interval="false">
                        <div class="carousel-inner">
                            <!-- There must be one active carousel item -->
                            <div class="carousel-item active" style="height:360px;">
                                <img class="d-block w-100" src="{{ asset('storage/images/noimage.jpg') }}" alt="noimage.jpg">
                            </div>
                            @foreach(explode("|", $animal->image) as $image)
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
                </div>

                <div class="col-md-12 col-md-offset-4">
                    <a href="{{ url()->previous() }}" class="btn btn-pink" role="button">Back to the list</a>
                    <input style="margin-left:20%;" type="submit" class="btn btn-green"/>
                    <input style="margin-left:20%;" type="reset" class="btn btn-red" onclick="return confirm('Are you sure you want to discard the changes?')"/>
                </div>
            </form>
        </div>
    </div>
@endsection