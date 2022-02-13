<div class="form-group">
    <label for="address1">Address</label>
    <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" placeholder="1234 Main St" value="{{ old('address2') ?? $addressLine1 }}" required autofocus>
</div>
<div class="form-group">
    <label for="address2">Address 2</label>
    <input type="text" class="form-control @error('address2') is-invalid @enderror" id="address2" name="address2" placeholder="Apartment, studio, or floor" {{ old('address2') ?? $addressLine2 }}  autofocus>
</div>
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
@section('scripts')
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
@endsection
