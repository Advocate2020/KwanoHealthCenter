@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Medical Aid List</h1>
            <a class="btn btn-primary" href="/admin/{{auth()->user()->id}}/medicals/create">Add Medical aid</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">Medical Name</div>
    </div>
    <hr>



    @foreach($medical as $med)
        <div class="row">
            <div class="col-6">
                {{ $med->id }}
            </div>
            <div class="col-6">

                    <li><a href="{{ route('medical.edit', ['user' => auth()->user()->id,'medical' => $med->id]) }}">
                            {{ $med->name }}
                        </a></li>



            </div>

        </div>
    @endforeach










@endsection
