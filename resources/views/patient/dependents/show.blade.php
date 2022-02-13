@extends('layouts.patient')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Details for {{ $dependent->name }}</h1>
            <a class="btn btn-primary" href="{{ route('dependent.edit', ['user' => auth()->user()->id,'dependent' => $dependent->dependentID]) }}">Edit Dependent</a>
        </div>
    </div>
    <hr>

    <div class="row mdi-align-vertical-center-center">
        <div class="col-3">
            <dl>
                <dt>Name</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->name }}</dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Surname</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->surname }}</dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Date of Birth</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->dob }}</dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Phone</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->phone }}</dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Email</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->email }}</dd>
            </dl>
        </div>
        <div class="col-3">
            <dl>
                <dt>Home Address</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->addressLine1}}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->addressLine2}}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->suburb->suburbname }}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->suburb->code }}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->suburb->city->cityname }}</dd>
            </dl>
        </div>

        <div class="col-3">
            <dl>
                <dt>Payment Details</dt>
            </dl>
        </div>
        <div class="col-9">
            <dl>
                <dd>{{ $dependent->medical->name ?? false }}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->plan->name ?? false }}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->medical_number ?? false }}</dd>
            </dl>
            <dl>
                <dd>{{ $dependent->cash ?? false }}</dd>
            </dl>

        </div>

    </div>

@endsection
