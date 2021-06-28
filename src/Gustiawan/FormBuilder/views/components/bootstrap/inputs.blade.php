@foreach($form->fields as $field)
    <div class="form-group">
        <label for="{{ $field['name'] }}" class="font-weight-bold">{!! $field['label'] !!}</label>
        @if( !in_array($field['type'], ["text", "date", "password", "number", "upload"]))
            @include('form-generator::components.bootstrap.fields.'.$field['type'], ["field" => $field])
        @else
            @include('form-generator::components.bootstrap.fields.input', ["field" => $field])
        @endif
    </div>
@endforeach
<button class="btn {{ $form->button['color'] }}">{{ $form->button['label'] }}</button>
