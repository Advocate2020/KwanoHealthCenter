@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Main Member Registration</h1>
            <hr style="background-color: white">
        </div>
        <label for="" style="color: red">*</label><label for="">indicates required</label>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="/register/store" method="POST" enctype="multipart/form-data">
            @csrf
            <!--name and surname-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name" class="form-label">First Name <label for="" style="color: red">*</label></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')  }}" required autocomplete="name" placeholder="enter name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="surname" class="form-label">Last Name <label for="" style="color: red">*</label></label>
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


                        <label for="idNumber" class="form-label">ID Number <label for="" style="color: red">*</label></label>
                        <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror" name="idNumber" value="{{ old('idNumber')  }}" required autocomplete="idNumber" placeholder="enter id number" maxlength="13" minlength="13" autofocus>

                        @error('idNumber')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                </div>
                <!--phone and email-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone" class="form-label" >Phone Number <label for="" style="color: red">*</label></label>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')  }}" required autocomplete="phone" placeholder="enter cellphone number" autofocus>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }} <label for="" style="color: red">*</label></label>
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
                        <label for="password" class="form-label" >Password <label for="" style="color: red">*</label></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="password-confirm" class="form-label" >{{ __('Confirm Password') }} <label for="" style="color: red">*</label></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!--address 1-->
                <div class="form-group">
                    <label for="address1">Address <label for="" style="color: red">*</label></label>
                    <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" value="{{ old('address1')  }}" placeholder="1234 Main St" required autofocus>
                </div>
                <!--address2-->
                <div class="form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" class="form-control" id="address2" name="address2" value="{{ old('address2')  }}" placeholder="Apartment, studio, or floor" autofocus>
                </div>
                <!--suburb and code-->
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="suburb">Suburb <label for="" style="color: red">*</label></label>
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
                        <label for="code">Suburb code <label for="" style="color: red">*</label></label>
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
                    <label for="medicalStatus" class="form-label">Are you on medical aid <label for="" style="color: red">*</label></label>
                    <select name="medicalStatus" id="medicalStatus" class="form-control">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                    @error('medicalStatus')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>

                <!--plan and medical number-->
                <div class="yes box">
                    <div class="form-group">
                        <label for="med_id">Medical Aid <label for="" style="color: red">*</label></label>
                        <select name="med_id" id="med_id" class="form-control">
                            <option selected="false">Select Medical Aid</option>
                            @foreach ($medicals as $med)
                                <option value="{{ $med->id }}">{{$med->name}}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="plan_id">Medical Plan <label for="" style="color: red">*</label></label>
                        <select name="plan_id" id="plan_id" class="form-control">
                        </select>
                        @error('plan_id')
                        <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                           </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="medNumber">Medical Number <label for="" style="color: red">*</label></label>
                        <input id="medNumber" type="text" class="form-control @error('medNumber') is-invalid @enderror" name="medNumber" value="{{ old('medNumber')  }}" autocomplete="medNumber" autofocus>

                        @error('medNumber')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
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
