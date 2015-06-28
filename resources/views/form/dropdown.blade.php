<div class="form-group">
    <label for="{{$name}}" class="col-sm-2">{{$designation}}</label>
    <div class="col-sm-10">
        <select class="form-control" name="{{$name}}">
            <option value="0">({{$designation}})</option>
            @foreach($list as $v)
                <?php $v = (object) $v; ?>
                <option value="{{$v->id}}" {{$v->id == $value ? 'selected=\'selected\'' : ''}}>{{$v->name}}</option>
            @endforeach
            @if ($other)
                <option value="-1">Outro</option>
            @endif
        </select>
    </div>
</div>