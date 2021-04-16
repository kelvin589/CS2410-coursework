<!-- inherit master template app.blade.php -->
@extends('layouts.app')

@section('columns', '7')
@section('title', 'Edit and Update Animal')

<!-- define the content section -->
@section('content')
    @include('elements.session_alerts')
    <div style="background-color:#FCD5CE" class="card">
        <!-- Define the form -->
        <div class="card-body">
            <form class="form-horizontal form-div" method="POST" action="{{ route('animals.update', ['animal' => $animal['id']]) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="col-md-8 form-label">
                    <label>Animal Name</label>
                    <br />
                    <input type="text" name="name" value="{{ $animal->name }}" />
                </div>
                <div class="col-md-8 form-label">
                    <label>Date of Birth</label>
                    <br />
                    <input type="date" name="date_of_birth" value="{{ $animal->date_of_birth }}" />
                </div>
                <div class="col-md-8 form-label">
                    <label>Type</label>
                    <br />
                    @include('elements.select_animal_type', ['type' => $animal->type, 'onchange' => '', 'showall' => false])
                </div>
                <div class="col-md-8 form-label">
                    <label>Description</label>
                    <br />
                    <textarea rows="4" cols="55" name="description" placeholder="Description for the animal. Max 256 characters.">{{ $animal->description }}</textarea>
                </div>
                <div class="col-md-12 form-label">
                    <label>Image</label>
                    <br />
                    <input type="file" accept="image/*" name="images[]" placeholder="Image file" multiple />
                    <h6 style="margin-top:10px; margin-bottom:-10px;">Current Images:</h6>
                    @include('elements.carousel', ['item' => $animal])
                    <br />
                </div>
                <div class="col-md-12 col-md-offset-4">
                    <a href="{{ url()->previous() }}" class="btn btn-pink" role="button">Back to the list</a>
                    <input style="margin-left:27%;" type="submit" class="btn btn-green" />
                    <input style="margin-left:27%;" type="reset" class="btn btn-red" onclick="return confirm('Are you sure you want to discard the changes?')" />
                </div>
            </form>
        </div>
    </div>
@endsection