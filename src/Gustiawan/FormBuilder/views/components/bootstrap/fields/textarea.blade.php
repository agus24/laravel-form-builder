<textarea name="{{ $field['name'] }}" 
    class="form-control {{ $field['class'] }}" 
    id="{{ $field['name'] }}"
    {{ $field['required'] ? "required" : "" }}
>{{ old($field['name']) ?? $field['value'] }}</textarea>
