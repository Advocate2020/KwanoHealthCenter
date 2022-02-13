@extends('layouts.patient')

@section('content')
    <div class="bg-secondary row">
        <div class="col-12">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-baseline">
            <h1>MY Profile Details</h1>
        </div>
    </div>

    <hr>
    <div class="row">
        <div class="col-12">
            <form action="/patient/{{auth()->user()->id}}/profile/update" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
            <!--name and surname-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="form-label">First Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $patient->name }}" required autocomplete="name" placeholder="enter name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname" class="form-label">Last Name</label>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') ?? $patient->surname }}" required autocomplete="surname" placeholder="enter surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <!--dob and id number-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="datepicker" class="form-label">Date Of Birth</label>
                        <input id="datepicker" type="date" class="form-control @error('datepicker') is-invalid @enderror" name="datepicker" value="{{ old('datepicker') ?? $patient->dob }}" min="1960-01-01" max="2030-12-31" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="idNumber" class="form-label">ID Number</label>
                        <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror" name="idNumber" value="{{ old('idNumber') ?? $patient->idNumber }}" required autocomplete="idNumber" placeholder="enter id number" autofocus>

                        @error('idNumber')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <!--phone and email-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone" class="form-label" >Phone Number</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $patient->phone }}" required autocomplete="phone" placeholder="enter cellphone number" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $patient->email }}" required autocomplete="email" placeholder="enter email address" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <!--usertype and password-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="usertype" class="form-label">User Type</label>
                        <select name="usertype" id="usertype" class="form-control">
                            <option value="Patient">Patient</option>
                        </select>
                        @error('usertype')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password" class="form-label" >Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <!--confirm password-->
                <div class="form-group">
                    <label for="password-confirm" class="form-label" >{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <!--address 1-->
                <div class="form-group">
                    <label for="address1">Address Line 1</label>
                    <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" value="{{ old('address1') ?? $patient->addressLine1 }}" placeholder="1234 Main St" required autofocus>
                </div>
                <!--address2-->
                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" class="form-control @error('address2') is-invalid @enderror" id="address2" name="address2" value="{{ old('address2') ?? $patient->addressLine2 }}" placeholder="Apartment, studio, or floor" required autofocus>
                </div>
                <!--suburb and code-->
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="suburb">Suburb</label>
                        <select name="suburb" id="suburb" class="form-control" autocomplete="suburb">
                            <option selected="false">Select suburb</option>
                            @foreach ($suburbs as $suburb)
                                <option value="{{ $suburb->id }}">{{ $suburb->suburbname}}</option>
                            @endforeach
                        </select>
                        @error('suburb')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-2">
                        <label for="code">Suburb code</label>
                        <select name="code" id="code" class="form-control"  autocomplete="code">
                        </select>
                        @error('code')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                </div>
                <!--medical aid-->
                <div class="form-group">
                    <label for="med_id">Medical Aid</label>
                    <select name="med_id" id="med_id" class="form-control">
                        <option selected="false">Select Medical Aid</option>
                        @foreach ($medicals as $med)
                            <option value="{{ $med->id }}">{{$med->name}}</option>
                        @endforeach
                    </select>
                </div>
                <!--plan and medical number-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="plan_id">Medical Plan</label>
                        <select name="plan_id" id="plan_id" class="form-control">
                        </select>
                        @error('plan_id')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="medNumber">Medical Number</label>
                        <input id="medNumber" type="text" class="form-control @error('medNumber') is-invalid @enderror" name="medNumber" value="{{ old('medNumber') ?? $patient->medical_number }}" required autocomplete="medNumber" autofocus>

                        @error('medNumber')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
            @if ($errors->any()) @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach @endif
        </div>
    </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true
            });
        });
    </script>
    <script type="text/javascript">

        jQuery(document).ready(function() {
            jQuery('select[name="suburb"]').on('change', function() {
                var subID = document.getElementById("suburb").value;
                if(subID)
                {
                    jQuery.ajax({
                        url: '/getcode/'+encodeURI(subID),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            jQuery('select[name="code"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="code"]').append('<option value="'+ value +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="code"]').empty();
                }
            });
        });
    </script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="med_id"]').on('change', function() {
                var medID = document.getElementById("med_id").value;
                if(medID)
                {
                    jQuery.ajax({
                        url: '/getplans/'+encodeURI(medID),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            jQuery('select[name="plan_id"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="plan_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('select[name="plan_id"]').empty();
                }
            });
        });
    </script>

@endsection
