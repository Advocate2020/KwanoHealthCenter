@extends('layouts.nurse')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>My Suburb</h1>
            <a class="btn btn-primary" href="/nurse/{{Auth::user()->id}}/suburb/create">Manage Suburb</a>
        </div>
    </div>
    <hr>


    @foreach($nurse as $nurs)
    @if($nurs->user_id == NULL)
        <div class="row mdi-align-vertical-center-center">
            <p>You Havent indicated your suburb yet!!</p>
        </div>
    @else
        <div class="row mdi-align-vertical-center-center">
            <div class="col-3">
                <dl>
                    <dt>Suburb Name</dt>
                </dl>
            </div>
            <div class="col-9">
                <dl>
                    <dd>{{ $nurs->suburbname }}</dd>
                </dl>
            </div>
            <div class="col-3">
                <dl>
                    <dt>Postal Code</dt>
                </dl>
            </div>
            <div class="col-9">
                <dl>
                    <dd>{{ $nurs->code }}</dd>
                </dl>
            </div>
            <div class="col-3">
                <dl>
                    <dt>City</dt>
                </dl>
            </div>
            <div class="col-9">
                <dl>
                    <dd>{{ $nurs->cityname }}</dd>
                </dl>
            </div>
        </div>
    @endif
    @endforeach
@endsection
