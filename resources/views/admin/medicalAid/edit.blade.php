@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Update Medical Aid</h1>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <form action="/admin/{{Auth::user()->id}}/medicals/update/{{$medical->id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('admin.medicalAid.form')

                <button type="submit" class="btn btn-primary">Save Changes</button>
                @csrf
            </form>
        </div>
    </div>

@endsection
