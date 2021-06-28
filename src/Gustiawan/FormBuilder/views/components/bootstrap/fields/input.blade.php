<input class="form-control {{ $field['class'] }}" 
    id="{{ $field['name'] }}" 
    type="{{ $field['type'] }}" 
    name="{{ $field['name'] }}" 
    value="{{ old($field['name']) ?? $field['value'] }}"
    {{ $field['readonly'] ? "readonly" : "" }}
    {{ $field['disabled'] ? "disabled" : "" }}
    {{ $field['required'] ? "required" : "" }}
    @if ($field['type'] == 'number')
        step="any"
    @endif
    >
