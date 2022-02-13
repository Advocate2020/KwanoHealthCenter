@extends('layouts.nurse')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>Test Details</h1>
        </div>
    </div>
    <hr>
    <div class="row alert alert-primary alert-dismissible" style="margin-bottom: 10px">

        <header class="w3-container" style="padding-top:22px">
            Patient 1 Test Details
        </header>
        <br>
        <div class="col-12">
            <form action="/nurse/{{Auth::user()->id}}/test/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="color: black">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="name" class="form-label">Patient Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $member->name }} {{$member->surname}}" disabled>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="barcode" class="form-label">Barcode</label>
                            <input id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ $string  }}" required>
                            @error('barcode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="temperature" class="form-label">Temperature</label>
                            <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="temperature" value="{{ old('temperature')  }}" required placeholder="enter temperature" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="blood_pressure" class="form-label">Blood Pressure</label>
                            <input id="blood_pressure" type="text" class="form-control @error('blood_pressure') is-invalid @enderror" name="blood_pressure" value="{{ old('blood_pressure')  }}" required  placeholder="enter blood pressure" autofocus>
                            @error('blood_pressure')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <label for="oxygen_level" class="form-label">Oxygen Level</label>
                            <input id="oxygen_level" type="text" class="form-control @error('oxygen_level') is-invalid @enderror" name="oxygen_level" value="{{ old('oxygen_level')  }}" required  placeholder="enter oxygen level" autofocus>
                            @error('oxygen_level')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-2">
                            <input id="member_id" type="text" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ $member->memberID  }}" required hidden>
                            <input id="request_id" type="text" class="form-control @error('request_id') is-invalid @enderror" name="request_id" value="{{ $requestID  }}" required hidden>

                            @error('member_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <button type="submit" class="btn btn-success" style="margin-top: 30px"><i class="fas fa-check">Done</i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach($dependents as $dependent)
        <div class="row alert alert-primary alert-dismissible" style="margin-bottom: 10px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <header class="w3-container" style="padding-top:22px">
                Patient Test Details
            </header><hr>
            <div class="col-12">
                <form action="/nurse/{{Auth::user()->id}}/test/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="color: black">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="name" class="form-label">Patient Name</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $dependent->name }} {{$dependent->surname}}" disabled>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="barcode" class="form-label">Barcode</label>
                                <input id="barcode" type="text" class="form-control @error('barcode') is-invalid @enderror" name="barcode" value="{{ $string  }}" required>
                                @error('barcode')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="temperature" class="form-label">Temperature</label>
                                <input id="temperature" type="text" class="form-control @error('temperature') is-invalid @enderror" name="temperature" value="{{ old('temperature')  }}" required placeholder="enter temperature" autofocus>

                                @error('surname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="blood_pressure" class="form-label">Blood Pressure</label>
                                <input id="blood_pressure" type="text" class="form-control @error('blood_pressure') is-invalid @enderror" name="blood_pressure" value="{{ old('blood_pressure')  }}" required  placeholder="enter blood pressure" autofocus>
                                @error('blood_pressure')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <label for="oxygen_level" class="form-label">Oxygen Level</label>
                                <input id="oxygen_level" type="text" class="form-control @error('oxygen_level') is-invalid @enderror" name="oxygen_level" value="{{ old('oxygen_level')  }}" required  placeholder="enter oxygen level" autofocus>
                                @error('oxygen_level')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-2">
                                <input id="member_id" type="text" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ $dependent->dependentID  }}" required  hidden>
                                <input id="request_id" type="text" class="form-control @error('request_id') is-invalid @enderror" name="request_id" value="{{ $requestID  }}" required hidden>

                                @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn btn-success" style="margin-top: 30px"><i class="fas fa-check">Done</i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
@section('scripts')
{{--    <script>--}}
{{--        document.forms['myFirstForm'].addEventListener('submit', function (event) {--}}
{{--            // Do something with the form's data here--}}
{{--            this.style['display'] = 'none';--}}
{{--            event.preventDefault();/*w  w w.  j av  a2s.c  o  m*/--}}
{{--        });--}}

{{--    </script>--}}
@endsection
