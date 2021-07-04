@foreach($form->fields as $field)
    @if ($field['type'] == 'separator')
        <div class="form-group" style="margin-top: 3em; margin-bottom: 2em;">
            @if ($field['label'] != '')
                <h1 class="font-weight-bold">{{ $field['label'] }}</h1>
            @endif
            <hr />
        </div>
        @continue
    @endif
    <div class="form-group">
        <label for="{{ $field['name'] }}" class="font-weight-bold">{!! $field['label'] !!}</label>
        @if(in_array($field['type'], ["text", "date", "password", "number", "file"]))
            @include('form-generator::components.bootstrap.fields.input', ["field" => $field])
        @else
            @include('form-generator::components.bootstrap.fields.'.$field['type'], ["field" => $field])
        @endif
    </div>
@endforeach
<button class="btn {{ $form->button['color'] }}">{{ $form->button['label'] }}</button>
