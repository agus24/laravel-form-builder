<select name="{{ $field['name'] }}" class="mt-2 p-2 form-select w-full border" {{ $field['required'] ? "required" : "" }}>
    <option>Select</option>
    @foreach($field['choices'] as $value => $choice)
        <option value="{{ $value }}" {{ (old($field['name']) ?? $field['value']) == $value ? "selected" : "" }} >{{ $choice }}</option>
    @endforeach
</select>
