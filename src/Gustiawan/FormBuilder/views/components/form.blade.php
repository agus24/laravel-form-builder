<form action="{{ $form->action }}" 
    method="{{ $form->method != "GET" ? "POST" : "GET" }}" 
    class="flex justify-center"
>
    @if($form->isNeedCsrf())
        @csrf
    @endif

    @if($form->method != "POST" || $form->method != "GET")
        @method($form->method)
    @endif
    <div class="w-full">
        @foreach($form->fields as $field)
            <div class="mb-4">
                <label class="ml-1">{!! $field['label'] !!}</label>
                @if($field['type'] == "select")
                    <select name="{{ $field['name'] }}" class="mt-2 p-2 form-select w-full border">
                        <option>Select</option>
                        @foreach($field['choices'] as $value => $choice)
                            <option value="{{ $value }}" {{ (old($field['name']) ?? $field['value']) == $value ? "selected" : "" }} >{{ $choice }}</option>
                        @endforeach
                    </select>
                @elseif($field['type'] == "radio")
                    <div class="mt-2 p-2 w-full">
                        @foreach($field['choices'] as $value => $choice)
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" 
                                        class="form-radio bg-gray-200" 
                                        name="{{ $field['name'] }}"
                                        value="{{ $value }}" 
                                        {{ (old($field['name']) ?? $field['value']) == $value ? "checked" : "" }}>
                                <span class="ml-2">{{ $choice }}</span>
                            </label>
                        </div>
                        @endforeach
                    </div>
                @elseif($field['type'] == "checkbox")
                    <div class="mt-2 p-2 rounded w-full">
                        @foreach($field['choices'] as $value => $choice)
                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" 
                                            class="form-checkbox bg-gray-200" 
                                            name="{{ $field['name'] }}[]"
                                            value="{{ $value }}"
                                            {{ in_array($value, (old($field['name']) ?? $field['value'])) ? "checked" : "" }}>
                                    <span class="ml-2">{{ $choice }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                @elseif($field['type'] == "textarea")
                    <textarea name="{{ $field['name'] }}" class="mt-2 p-2 rounded w-full border">{{ old($field['name']) ?? $field['value'] }}</textarea>
                @else
                    <input class="mt-2 p-2 rounded w-full border" type="{{ $field['type'] }}" name="{{ $field['name'] }}" value="{{ old($field['name']) ?? $field['value'] }}">
                @endif
            </div>
        @endforeach

        <div class="mb-4">
            <button class="p-2 rounded w-full text-white {{ $form->button['color'] }}">{{ $form->button['label'] }}</button>
        </div>
    </div>
</form>
