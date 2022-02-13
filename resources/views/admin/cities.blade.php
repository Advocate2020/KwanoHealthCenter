@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Cities List</h1>
        </div>
    </div>


    <form action="/admin/{{Auth::user()->id}}/cities" method="POST" class="pb-5">
        <div class="form-group">
            <label for="name" >City Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="text-danger">
            <small>{{ $errors->first('name') }}</small>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Add City</button>
        @csrf
    </form>

    <ul>
        @foreach ($cities as $city)
            <li>{{ $city->cityname }}</li>
        @endforeach
    </ul>


@endsection
