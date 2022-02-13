<style>
    .box{

        display: none;

    }
    .yes{  }

</style>
<!--name and surname-->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name" class="form-label">First Name</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $dependent->name ?? false}}" required autocomplete="name" placeholder="enter name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="surname" class="form-label">Last Name</label>
        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') ?? $dependent->surname ?? false}}" required autocomplete="surname" placeholder="enter surname" autofocus>

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
    <input id="idNumber" type="text" class="form-control @error('idNumber') is-invalid @enderror" name="idNumber" value="{{ old('idNumber') ?? $dependent->idNumber ?? false}}" required autocomplete="idNumber" placeholder="enter id number" autofocus>

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
        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $dependent->phone ?? false}}" required autocomplete="phone" placeholder="enter cellphone number" autofocus>
        @error('phone')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $dependent->email ?? false}}" required autocomplete="email" placeholder="enter email address" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
        @enderror
    </div>
</div>
<!--address 1-->
<div class="form-group">
    <label for="address1">Address</label>
    <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" value="{{ old('address1') ?? $dependent->addressLine1 ?? false}}" placeholder="1234 Main St" required autofocus>
</div>
<!--address2-->
<div class="form-group">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control" id="address2" name="address2" value="{{old('addressLine2') ?? $dependent->addressLine2 ?? false}}" placeholder="Apartment, studio, or floor" autofocus>
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
    <label for="medicalStatus" class="form-label">Are you on medical aid</label>
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
        <label for="med_id">Medical Aid</label>
        <select name="med_id" id="med_id" class="form-control">
            <option selected="false">Select Medical Aid</option>
            @foreach ($medicals as $med)
                <option value="{{ $med->id }}">{{$med->name}}</option>
            @endforeach
        </select>
    </div>
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
            <input id="medNumber" type="text" class="form-control @error('medNumber') is-invalid @enderror" name="medNumber" autocomplete="medNumber" autofocus>

            @error('medNumber')
            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
            @enderror
        </div>
    </div>
</div>

<!-- End -->
@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="suburb"]').on('change', function() {
                var subID = document.getElementById("suburb").value;
                if(subID)
                {
                    jQuery.ajax({
                        url: '/patient/{{Auth::user()->id}}/address/getcode/'+encodeURI(subID),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            jQuery('select[name="code"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="code"]').append('<option value="'+ key +'">'+ value +'</option>');
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














