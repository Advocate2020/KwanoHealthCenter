@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                </svg>MY ADDRESS</h1>
            <a class="btn btn-primary" href="/patient/{{auth()->user()->id}}/address/edit">Edit Address</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-3">House Number</div>
        <div class="col-sm-3">Suburb</div>
        <div class="col-sm-3">Code</div>
        <div class="col-sm-3">City</div>
    </div>
    <hr>
    <div class="row ">
        @foreach($patients as $patient)
        <div class="col-sm-3">
            {{ $patient->addressLine1 ?? false }} {{ $patient->addressLine2 ?? false }}
        </div>
        <div class="col-sm-3">
                {{ $patient->suburbname ?? false }}
        </div>
        <div class="col-sm-3">
            {{ $patient->code ?? false }}
        </div>
        <div class="col-sm-3">
            {{ $patient->cityname ?? false}}
        </div>
        @endforeach
    </div>

@endsection
