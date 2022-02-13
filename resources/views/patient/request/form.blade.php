<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Welcome!</h4>
    <p>Aww yeah, Thanks again for choosing Kwano Health Center for your covid-19 test center. The following are some terms and conditions that you will need to comply.</p>
    <hr>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Please ensure that the whole family wears a mask
    </p>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Ensure that the whole family is ready and present before the nurse arrives.
    </p>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Pets should be caged or kept away from the testing area.
    </p>
</div>

<div class="alert alert-warning" role="alert">
    <h4 class="alert-heading">Please ensure the following details are correct.</h4>

    <hr>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Phone number
    </p>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Email Address
    </p>
    <p class="mb-0">
        <i class="bi bi-arrow-right-circle-fill"></i>
        Residential address.
    </p>
</div>

<legend>Request Details</legend>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">Test Creator</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{$name}} {{$surname}}" disabled>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="addressLine1" class="form-label">Address Line 1</label>
                            <input id="addressLine1" type="text" class="form-control  @error('addressLine1') is-invalid @enderror" name="addressLine1" value="{{$member->addressLine1 ?? false}}" required autocomplete="addressLine1" autofocus>
                            @error('addressLine1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="addressLine2" class="form-label">Address Line 2</label>
                            <input id="addressLine2" type="text" class="form-control  @error('addressLine2') is-invalid @enderror" name="addressLine2" value="{{$member->addressLine2 ?? false}}" autocomplete="addressLine2" autofocus>
                            @error('addressLine2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="suburb">Suburb</label>
                        <select name="suburb" id="suburb" class="form-control">
                            <option selected="false">Select suburb</option>
                            @foreach ($suburbs as $suburb)

                                <option  value="{{ $suburb->id }}">{{ $suburb->suburbname}}</option>
                            @endforeach
                        </select>
                        @error('suburb')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>


                        <div class="form-group" style="color: black">
                            <label><strong>Test Participants :</strong></label><br>
                            <input type="checkbox" name="participant[]" value="{{Auth::user()->id}}">Me
                            <br>
                            @foreach($dependents as $dependent)
                            <input type="checkbox" name="participant[]" value="{{$dependent->dependentID}}">{{$dependent->name}} <span class="text-muted">{dependent}</span>
                                <br>

                            @endforeach
                        </div>

                    <div class="form-group">
                        <select name="status" id="status" hidden>
                            <option value="new" selected="true">Status</option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if ($errors->any())
    @foreach ($errors->all() as $error)
    {{ $error }}
 @endforeach
@endif


