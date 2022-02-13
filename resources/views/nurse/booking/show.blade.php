@extends('layouts.nurse')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">My Schedule</h1>
            <hr style="background-color: white">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card" style="background-color: cornflowerblue">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#today" class="nav-link active "><i class="bi bi-card-checklist" aria-hidden="true"></i> Today's Schedule</a> </li>
                            <li class="nav-item"> <a data-toggle="pill" href="#tomorrow" class="nav-link "> <i class="bi bi-card-checklist"></i>Tomorrow's Schedule</a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="today" class="tab-pane fade show active pt-3">
                            <h3>Today Schedule</h3>
                            <hr>
                            @foreach($bookings as $booking)
                                @if($booking->bookingDate == $date)
                                    <div class="card" style="margin-bottom: 10px;color: black">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-4">Date</div>
                                                <div class="col-sm-4">Time</div>
                                                <div class="col-sm-4">Address</div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    {{ $booking->bookingDate }}
                                                </div>
                                                <div class="col-sm-4">
                                                    {{ $booking->timeSlot}}
                                                </div>
                                                <div class="col-sm-4">
                                                    {{ $booking->addressLine1}}
                                                    <br>
                                                    {{ $booking->addressLine2}}
                                                    <br>
                                                    {{ $booking->code}}
                                                    <br>
                                                    {{ $booking->suburbname ?? false}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    Patient
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row ">
                                                <div class="col-sm-12 d-flex justify-content-between align-items-baseline">
                                                    {{ $booking->name}} {{ $booking->surname}}
                                                    <a class="btn btn-success" href="{{ route('test.create', ['user' => auth()->user()->id,'requestorID' => $booking->requestorID,'requestID' => $booking->RequestID]) }}">Perform Test</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="card-footer">
                        </div>
                    </div> <!-- End -->
                    <!-- Paypal info -->
                    <div id="tomorrow" class="tab-pane fade pt-3">
                        <h3>Tomorrow's Schedule</h3>
                        <hr>
                        @foreach($bookings as $booking)
                            @if($booking->bookingDate == $tomorrow)
                                <div class="card" style="margin-bottom: 10px;color: black">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-4">Date</div>
                                            <div class="col-sm-4">Time</div>
                                            <div class="col-sm-4">Address</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                {{ $booking->bookingDate }}
                                            </div>
                                            <div class="col-sm-4">
                                                {{ $booking->timeSlot}}
                                            </div>
                                            <div class="col-sm-4">
                                                {{ $booking->addressLine1}}
                                                <br>
                                                {{ $booking->addressLine2}}
                                                <br>
                                                {{ $booking->code}}
                                                <br>
                                                {{ $booking->suburbname ?? false}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                Patient
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row ">
                                            <div class="col-sm-12 d-flex justify-content-between align-items-baseline">
                                                {{ $booking->name}} {{ $booking->surname}}
                                                <a class="btn btn-success" href="{{ route('test.create', ['user' => auth()->user()->id,'requestorID' => $booking->requestorID,'requestID' => $booking->RequestID]) }}">Perform Test</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           @endif
                    @endforeach
                        <div class="card-footer">
                        <!-- End -->
                    </div>

            </div>
        </div>
@endsection

