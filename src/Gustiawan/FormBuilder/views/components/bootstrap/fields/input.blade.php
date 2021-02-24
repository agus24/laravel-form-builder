<input class="form-control" 
    id="{{ $field['name'] }}" 
    type="{{ $field['type'] }}" 
    name="{{ $field['name'] }}" 
    value="{{ old($field['name']) ?? $field['value'] }}"
    {{ $field['required'] ? "required" : "" }}>
