<div class="form-group {{isset($visible) && !$visible ? 'hide' : ''}}">
    <label for="{{$name}}" class="col-sm-2">{{$designation}}</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="{{$name}}" name="{{$name}}" placeholder="{{$designation}}" value="{{$value or ''}}">
    </div>
</div>