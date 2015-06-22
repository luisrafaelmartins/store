<div class="form-group">
    <label for="{{$name}}" class="lh32 col-sm-2">{{$designation}}</label>
    <div class="col-sm-10">
        <input type="checkbox" style="margin-left: -15px" class="checkbox11 input-sm pull-left" name="{{$name}}" id="{{$name}}" value="1" {{isset($value) && $value == 1 ? 'checked' : '' }}/>
    </div>
</div>