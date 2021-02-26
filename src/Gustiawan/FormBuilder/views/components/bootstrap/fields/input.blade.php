<input class="form-control {{ $field['class'] }}" 
    id="{{ $field['name'] }}" 
    type="{{ $field['type'] }}" 
    name="{{ $field['name'] }}" 
    value="{{ old($field['name']) ?? $field['value'] }}"
    {{ $field['required'] ? "required" : "" }}>
