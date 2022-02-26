@props([
    'name' => '',
    'label' => '',
    'options' => null
])
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <select
        id="{{$name}}"
        name="{{$name}}"
        class="form-control @error($name) is-invalid @enderror"
        {{$attributes}}>
        {{$options}}
    </select>

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
