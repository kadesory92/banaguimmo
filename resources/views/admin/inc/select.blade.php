@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??=ucfirst($name);
@endphp

<div @class(['form-group mb-3', $class])>
    <label for="{{$name}}" class="form-label">{{$label}}</label>
    <select name="{{$name}}[]" id="{{$name}}" multiple>
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{$k}}">{{$v}}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>