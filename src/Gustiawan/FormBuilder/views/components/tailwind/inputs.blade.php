<div class="w-full">
    @foreach($form->fields as $field)
        @if ($field['type'] == 'separator')
            <div class="mb-4 my-3">
                @if ($field['label'] != '')
                    <label class="ml-1">{!! $field['label'] !!}</label>
                @endif
                <hr />
            </div>
            @continue
        @endif

        <div class="mb-4">
            <label class="ml-1">{!! $field['label'] !!}</label>
            @if( !in_array($field['type'], ["text", "date", "password", "number", "file"]))
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
