<div class="mt-2 p-2 w-full">
    @foreach($field['choices'] as $value => $choice)
    <div>
        <label class="inline-flex items-center">
            <input type="radio" 
                    class="form-radio bg-gray-200" 
                    name="{{ $field['name'] }}"
                    value="{{ $value }}" 
                    {{ (old($field['name']) ?? $field['value']) == $value ? "checked" : "" }}
                    {{ $field['required'] ? "required" : "" }}>
            <span class="ml-2">{{ $choice }}</span>
        </label>
    </div>
    @endforeach
</div>
