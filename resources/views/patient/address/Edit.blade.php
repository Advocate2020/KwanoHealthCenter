@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Address Details</h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <form action="/patient/{{Auth::user()->id}}/address/update" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('patient.address.form')

                <button type="submit" class="btn btn-primary">Save Changes</button>
                @csrf
            </form>
        </div>
    </div>

@endsection
