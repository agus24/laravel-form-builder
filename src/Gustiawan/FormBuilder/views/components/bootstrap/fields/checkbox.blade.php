@foreach($field['choices'] as $value => $choice)
    <div class="form-check">
        <input type="checkbox" 
            class="form-check-input" 
            name="{{ $field['name'] }}[]"
            id="{{ $field['name']."-{$value}" }}"
            value="{{ $value }}"
            {{ in_array($value, (old($field['name']) ?? $field['value'])) ? "checked" : "" }}>
        <label class="form-check-label" for="{{ $field['name']."-{$value}" }}">{{ $choice }}</label>
    </div>
@endforeach