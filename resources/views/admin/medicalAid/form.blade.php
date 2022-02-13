
    <div class="form-group">
        <label for="name" >Medical Aid Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{$medical->name}}">

        <div class="text-danger">
            <small>{{ $errors->first('name') }}</small>
        </div>
    </div>
    @csrf

