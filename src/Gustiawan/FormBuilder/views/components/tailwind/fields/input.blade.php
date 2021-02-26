<input class="mt-2 p-2 rounded w-full border {{ $field['class'] }}"
    type="{{ $field['type'] }}" 
    name="{{ $field['name'] }}" 
    value="{{ old($field['name']) ?? $field['value'] }}"
    {{ $field['required'] ? "required" : "" }}>
