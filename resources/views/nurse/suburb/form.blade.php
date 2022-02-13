<div class="form-group">
    <label for="city" >City</label>
    <select name="city" id="city" class="form-control" required autocomplete="city">
        <option selected="false">Select city</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->cityname}}</option>
        @endforeach

    </select>

    @error('city')
    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
    @enderror
</div>
<div class="form-group">
    <label for="suburb">Suburb</label>


    <select name="suburb" id="suburb" class="form-control" required autocomplete="suburb">
    </select>

    @error('suburb')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror

</div>
<div class="form-group">
    <label for="code">Suburb code</label>


    <select name="code" id="code" class="form-control" required autocomplete="code">
    </select>

    @error('code')
    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
    @enderror

</div>
@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('select[name="city"]').on('change', function() {
                var cityID = document.getElementById("city").value;
                if(cityID)
                {
                    jQuery.ajax({
                        url: '/patient/{{Auth::user()->id}}/address/getsub/'+encodeURI(cityID),
                        type: "GET",
                        dataType: "json",
                        success:function(data) {
                            jQuery('select[name="suburb"]').empty();
                            jQuery.each(data, function(key, value) {
                                $('select[name="suburb"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });
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
                                                    $('select[name="code"]').append('<option value="'+ value +'">'+ value +'</option>');
                                                });
                                            }
                                        });
                                    }else{
                                        $('select[name="code"]').empty();
                                    }
                                });
                            });
                        }
                    });
                }else{
                    $('select[name="suburb"]').empty();
                }
            });
        });
    </script>
@endsection
