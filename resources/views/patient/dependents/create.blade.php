@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>ADD DEPENDENT</h1>
        </div>
    </div>
<hr>

<div class="row">
    <div class="col-12 pb-5">
        <form action="/patient/{{Auth::user()->id}}/dependents/store" method="POST" enctype="multipart/form-data">
            @include('patient.dependents.form')

            <hr>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Add Dependent</button>
            </div>
            @csrf
        </form>
    </div>
</div>
@endsection
