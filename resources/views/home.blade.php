@extends('layouts.app')

@section('columns', '8')
@section('title', 'Dashboard')

@section('content')
    <div style="background-color:#FCD5CE" class="card">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
            <br />
        </div>
    </div>
@endsection
