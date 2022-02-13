@extends('layouts.nurse')
@section('content')
    <div class="container">

        <div class="card">

            <div class="card-header bg-primary">Booking Details</div>

            <div class="card-body">

                <form action="{{ route('bookings.store', ['user' => auth()->user()->id,'request' => $id]) }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif (Session::has('warnning'))
                            <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                        @endif
                    </div>
                    {{ Form::hidden('invisible', $id, array('id' => 'invisible')) }}
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            {!! Form::label('booking_date','Test Date:') !!}
                            <div class="">
                                {!! Form::date('booking_date', null, ['class' => 'form-control']) !!}
                                {!! $errors->first('booking_date', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            {!! Form::label('time','Time Slot:') !!}
                            <div class="">
                                {!! Form::select('time', ['6:00 – 8:00' => '6:00 – 8:00',' 8:00 – 10:00' => ' 8:00 – 10:00','10:00 – 12:00' => '10:00 – 12:00',' 12:00 – 14:00' =>' 12:00 – 14:00' ,' 14:00 – 16:00' =>' 14:00 – 16:00' ,' 16:00 – 18:00' => ' 16:00 – 18:00','18:00 – 20:00' => '18:00 – 20:00'],'12:00-13:00' ,['class' => 'form-control','placeholder' => 'Select Time Slot']) !!}
                                {!! $errors->first('time', '<p class="alert alert-danger">:message</p>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                        {!! Form::submit('Add Booking',['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}

            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function(){
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);


            $('#booking_date').attr('min', maxDate);
        });
    </script>
@endsection
