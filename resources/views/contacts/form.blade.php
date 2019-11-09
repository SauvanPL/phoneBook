<label for="name">Name</label>
<div class="form-group">
    <input type="text" name="name" value="{{old('name')?? $contact->name}}" class="form-control">
</div>
<div>{{$errors->first('name')}}</div>

<label for="number">Phone Number</label>
<div class="form-group">
    <input type="text" name="number" value="{{old('number')?? $contact->number}}" class="form-control">
</div>
<div>{{$errors->first('number')}}</div>
@csrf
