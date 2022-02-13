@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Medical Aid Details</h1>
        </div>
    </div>
<hr>

<div class="row">
    <div class="col-12">
        <form action="/admin/{{Auth::user()->id}}/plans/store" method="POST" enctype="multipart/form-data">
            @include('admin.medicalPlans.form')

            <button type="submit" class="btn btn-primary">Add Medical Plan</button>

        </form>
    </div>
</div>
@endsection
