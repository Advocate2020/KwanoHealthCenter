@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="/admin/{{Auth::user()->id}}/register/nurse/store" method="POST" enctype="multipart/form-data">
            @csrf
            <!--name and surname-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="form-label">First Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}" required autocomplete="name" placeholder="enter name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname" class="form-label">Last Name</label>
                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname')  }}" required autocomplete="surname" placeholder="enter surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <!--dob and id number-->
                <div class="form-group">


                        <label for="idNumber" class="form-label">ID Number</label>
                        <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror" name="idNumber" value="{{ old('idNumber')  }}" required autocomplete="idNumber" placeholder="enter id number" autofocus>

                        @error('idNumber')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>
                <!--phone and email-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone" class="form-label" >Phone Number</label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')  }}" required autocomplete="phone" placeholder="enter cellphone number" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="enter email address" autofocus>
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
                        <label for="password" class="form-label" >Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password-confirm" class="form-label" >{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
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


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>

            </form>
{{--            @if ($errors->any()) @foreach ($errors->all() as $error)--}}
{{--                {{ $error }}--}}
{{--            @endforeach @endif--}}
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: '1945:'+(new Date).getFullYear()
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
    <script>
        $(document).ready(function(){
            $('select[name="medicalStatus"]').change(function(){
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
