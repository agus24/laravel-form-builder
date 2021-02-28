<textarea name="{{ $field['name'] }}" 
    class="form-control {{ $field['class'] }}" 
    id="{{ $field['name'] }}"
    {{ $field['required'] ? "required" : "" }}
    {{ $field['readonly'] ? "readonly" : "" }}
    {{ $field['disabled'] ? "disabled" : "" }}
>{{ old($field['name']) ?? $field['value'] }}</textarea>
