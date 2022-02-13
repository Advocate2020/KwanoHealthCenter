@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Update {{$dependent->name}}'s Details</h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <form action="/patient/{{Auth::user()->id}}/dependents/update/{{$dependent->dependentID}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('patient.dependents.form')

                <button type="submit" class="btn btn-primary">Save Changes</button>
                @csrf
            </form>
        </div>
    </div>

@endsection
