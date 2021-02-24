@foreach($field['choices'] as $value => $choice)
    <div class="form-check">
        <input type="radio" 
            class="form-check-input"
            name="{{ $field['name'] }}"
            value="{{ $value }}" 
            id="{{ $field['name']."-{$value}" }}"
            {{ (old($field['name']) ?? $field['value']) == $value ? "checked" : "" }}
            {{ $field['required'] ? "required" : "" }}>
        <label class="form-check-label" for="{{ $field['name']."-{$value}" }}">{{ $choice }}</label>
    </div>
@endforeach
