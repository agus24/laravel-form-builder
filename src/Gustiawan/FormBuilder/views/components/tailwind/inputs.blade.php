<div class="w-full">
    @foreach($form->fields as $field)
        <div class="mb-4">
            <label class="ml-1">{!! $field['label'] !!}</label>
            @if( !in_array($field['type'], ["text", "date", "password", "number", "upload"]))
                @include('form-generator::components.tailwind.fields.'.$field['type'], ["field" => $field])
            @else
                @include('form-generator::components.tailwind.fields.input', ["field" => $field])
            @endif
        </div>
    @endforeach
    <div class="mb-4">
        <button class="p-2 rounded w-full text-white {{ $form->button['color'] }}">{{ $form->button['label'] }}</button>
    </div>
</div>
