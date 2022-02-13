@extends('layouts.patient')

@section('content')
    <header class="w3-container d-flex justify-content-between" style="padding-top:22px">
        <h2><b>Test Request</b></h2>
        <a href="/patient/{{Auth::user()->id}}/request" class="btn btn-primary">Back</a>
    </header>
    <hr>

    <div class="row">
        <div class="col-12 pb-5">
            <form action="/patient/{{Auth::user()->id}}/request/store" method="POST" enctype="multipart/form-data">
                @include('patient.request.form')

                <hr>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Request</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
