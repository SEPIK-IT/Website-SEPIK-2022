@props([
    'name' => '',
    'label' => '',
])
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input
        id="{{$name}}"
        name="{{$name}}"
        class="form-control @error($name) is-invalid @enderror"
        {{$attributes}}
    />

    @error($name)
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
