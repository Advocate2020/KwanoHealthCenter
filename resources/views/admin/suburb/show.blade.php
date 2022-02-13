@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Suburb List</h1>
            <a class="btn btn-primary" href="/admin/{{auth()->user()->id}}/suburbs/create">Add Suburb</a>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-sm-4">Suburb Name</div>
        <div class="col-sm-4">Postal Code</div>
        <div class="col-sm-4">City</div>
    </div>
    <hr>

    <div class="row ">
            <div class="col-sm-4">
                @foreach ($suburbs as $suburb)
                    <li>{{ $suburb->suburbname }} </span></li>
                @endforeach
            </div>
            <div class="col-sm-4">
                @foreach ($suburbs as $suburb)
                    <li>{{ $suburb->code }} </span></li>
                @endforeach
            </div>
           <div class="col-sm-4">
              @foreach ($suburbs as $suburb)
                  <li>{{ $suburb->city->cityname }} </span></li>
              @endforeach
           </div>
    </div>
@endsection
