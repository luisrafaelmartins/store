<div class="form-group">
    <label for="{{$name}}" class="col-sm-2">{{$designation}}</label>
    <div class="col-sm-10">
        <textarea name="{{$name}}" class="form-control" id="{{$name}}" placeholder="{{$designation}}">{{$value or ''}}</textarea>
    </div>
</div>