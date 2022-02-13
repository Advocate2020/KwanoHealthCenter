@extends('layouts.patient')

@section('content')
<div class="row">
    <div class="col-12 d-flex justify-content-between align-items-baseline">
        <h1>MY ADDRESS</h1>
        <a class="btn btn-primary" href="/patient/{{auth()->user()->id}}/address/create">Add Address</a>
    </div>
</div>
<hr>
@endsection
