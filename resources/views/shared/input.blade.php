<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input type="{{ isset($type)? $type : 'text' }}" class="form-control" name="{{ $name }}" id="{{ $name }}" value="{{ isset($vale)?? $vale}}">
</div>

{{--
$label is required
$name is required
$value is optional
$type is optional
--}}
