<form action="{{ $form->action }}" 
    method="{{ $form->method != "GET" ? "POST" : "GET" }}" 
    class="flex justify-center"
>
    @if($form->isNeedCsrf())
        @csrf
    @endif

    @if($form->method != "POST" && $form->method != "GET")
        @method($form->method)
    @endif
    @include('form-generator::components.' .config('form_generator.style'). '.inputs', ["form" => $form])

    {{ $slot }}
</form>
