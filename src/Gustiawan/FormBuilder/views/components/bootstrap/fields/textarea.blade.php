<textarea name="{{ $field['name'] }}" 
    class="form-control" 
    id="{{ $field['name'] }}"
    {{ $field['required'] ? "required" : "" }}
>{{ old($field['name']) ?? $field['value'] }}</textarea>
