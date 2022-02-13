@extends('layouts.nurse')

@section('content')
    <div class="col-12">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Please note!</strong>
                You can click on a request to pick it as your Test Booking.
                Please choose  requests that are <b>Closer</b> to one another.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
        <br><br>
        <div class="row pb-4">
            <div class="col-12 d-flex justify-content-between align-items-baseline">
                <h1 class="p-b-3">Favourite Suburbs Requests</h1>
            </div>
        </div>
    <div class="table-responsive bg-white" style="margin-bottom: 10px">
        <table class="table table-bordered table-hover">
            <caption>Past Test Requests</caption>
            <thead>
            <tr>
                <th scope="col" class="">#</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Status</th>
                <th scope="col">Suburb</th>
                <th scope="col">Requestor</th>
            </tr>
            </thead>
            <tbody>
            @foreach($requests as $req)
                <tr>
                    <th scope="row">{{$req->requestID}}</th>
                    <td>
                        <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $req->requestID]) }}">{{ $req->requestDate}}</a>
                    </td>
                    <td>
                        <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $req->requestID]) }}">{{ $req->requestTime}}</a>
                    </td>
                    <td>
                        <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $req->requestID]) }}">{{ $req->status}}</a>
                    </td>
                    <td>
                        <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $req->requestID]) }}">{{ $req->suburbname}}</a>
                    </td>
                    <td>
                        <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $req->requestID]) }}">{{ $req->name}} {{ $req->surname}}</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
        <br>
        <div class="form-group">
            <label for="all" class="form-label">View all requests?</label>
            <select name="all" id="all" class="form-control">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
            @error('medicalStatus')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>
        <br>
        <div class="yes box">
            <div class="row pb-4">
                <div class="col-12 d-flex justify-content-between align-items-baseline">
                    <h1 class="p-b-3">All Suburbs Requests</h1>
                </div>
            </div>
            <div class="table-responsive bg-white" style="margin-bottom: 10px">
                <table class="table table-bordered table-hover">
                    <caption>Past Test Requests</caption>
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                        <th scope="col">Suburb</th>
                        <th scope="col">Requestor</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($others as $other)
                        <tr>
                            <td>
                                <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $other->requestID]) }}">{{ $other->requestDate}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $other->requestID]) }}">{{ $other->requestTime}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $other->requestID]) }}">{{ $other->status}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $other->requestID]) }}">{{ $other->suburbname}}</a>
                            </td>
                            <td>
                                <a href="{{ route('bookings.create', ['user' => auth()->user()->id,'request' => $other->requestID]) }}">{{ $other->name}} {{ $other->surname}}</a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="form-group">
            <a class="btn btn-success btn-lg float-right" href="/nurse/{{Auth::user()->id}}/bookings/show" style="margin-bottom: 30px">View Schedule</a>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $('select[name="all"]').change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
    </script>
@endsection
