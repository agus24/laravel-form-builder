<textarea name="{{ $field['name'] }}" 
    class="mt-2 p-2 rounded w-full border {{ $field['class'] }}"
    {{ $field['required'] ? "required" : "" }}
    {{ $field['readonly'] ? "readonly" : "" }}
    {{ $field['disabled'] ? "disabled" : "" }}
>{{ old($field['name']) ?? $field['value'] }}</textarea>
