@extends('layouts.nurse')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Add/Edit Suburb Details</h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <form action="/nurse/{{Auth::user()->id}}/suburb/store" method="POST" enctype="multipart/form-data">
                @include('nurse.suburb.form')

                <button type="submit" class="btn btn-primary">Add Suburb</button>
                @csrf
            </form>
        </div>
    </div>
@endsection







