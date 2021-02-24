<select name="{{ $field['name'] }}" id="{{ $field['name'] }}" class="form-control" {{ $field['required'] ? "required" : "" }}>
    <option>Select</option>
    @foreach($field['choices'] as $value => $choice)
        <option value="{{ $value }}" {{ (old($field['name']) ?? $field['value']) == $value ? "selected" : "" }} >{{ $choice }}</option>
    @endforeach
</select>
