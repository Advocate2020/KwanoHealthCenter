@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Suburb Details</h1>
        </div>
    </div>
<hr>

<div class="row">
    <div class="col-12">
        <form action="/admin/{{Auth::user()->id}}/suburbs/store" method="POST" class="pb-5">
            @include('admin.suburb.form')

            <button type="submit" class="btn btn-primary">Add Suburb</button>
            @csrf
        </form>
    </div>
</div>
@endsection
