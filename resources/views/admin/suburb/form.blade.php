<div class="form-group">
    <label for="name" >Suburb Name</label>
    <input type="text" class="form-control" name="name" id="name">

    <div class="text-danger">
        <small>{{ $errors->first('name') }}</small>
    </div>
</div>

<div class="form-group">
    <label for="code" >Postal Code</label>
    <input type="text" class="form-control" name="code" id="code">

    <div class="text-danger">
        <small>{{ $errors->first('code') }}</small>
    </div>
</div>


<div class="form-group">
    <label for="city_id">City</label>
    <select name="city_id" id="city_id" class="form-control">
        <option value="" disabled>Select city</option>
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->cityname }}</option>
        @endforeach
    </select>

    <div class="text-danger offset-sm-2">
        <div class="ml-3">
            <small>{{ $errors->first('city_id') }}</small>
        </div>
    </div>
</div>
