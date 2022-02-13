
    <div class="form-group">
        <label for="medical_id" >Medical Plan Name</label>
        <select name="medical_id" id="medical_id" class="form-control">
            <option value="" disabled>Select medical aid</option>
            @foreach ($medicals as $med)
                <option value="{{ $med->id }}">{{ $med->name}}</option>
            @endforeach
        </select>
        <div class="text-danger">
            <small>{{ $errors->first('medical_id') }}</small>
        </div>
    </div>

    <div class="form-group">
        <label for="name" >Medical Aid Plan</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Medical Plan Name" value="{{$medical->name ?? old('name')}}">

        <div class="text-danger">
            <small>{{ $errors->first('name') }}</small>
        </div>
    </div>
    @csrf




