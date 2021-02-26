<div class="mt-2 p-2 rounded w-full">
    @foreach($field['choices'] as $value => $choice)
        <div>
            <label class="inline-flex items-center">
                <input type="checkbox" 
                        class="form-checkbox bg-gray-200 {{ $field['class'] }}" 
                        name="{{ $field['name'] }}[]"
                        value="{{ $value }}"
                        {{ in_array($value, (old($field['name']) ?? $field['value'])) ? "checked" : "" }}>
                <span class="ml-2">{{ $choice }}</span>
            </label>
        </div>
    @endforeach
</div>
