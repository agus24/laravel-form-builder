<form action="{{ $form->action }}" 
    method="{{ $form->method != "GET" ? "POST" : "GET" }}" 
    class="flex justify-center"
    @if ($form->hasUpload)
        enctype="multipart/form-data"
    @endif
>
    @if($form->isNeedCsrf())
        @csrf
    @endif

    @if($form->method != "POST" && $form->method != "GET")
        @method($form->method)
    @endif
    @include('form-generator::components.' . config('form_generator.style') . '.inputs', ["form" => $form])

    {{ $slot }}
</form>

<script>
    function loadDataFor(element, field, url) {
        url = url.replaceAll(`{${field}}`, element.value)
        fetch(url).then(response => fetchField(field, values)).catch(error => alert(error))
    }

    function fetchField(field, values) {
        field.children.forEach(el => el.remove())
        let option = document.createElement('option')
        option.value = ""
        option.innerText = "Select"
        let options = [option]

        for (const value in values) {
            let option = document.createElement('option')
            option.value = value
            option.innerText = values[value]
            options.push(option)
        }

        for (let i = 0; i < options.length; i++) {
            field.appendChild(options[i])
        }
    }
</script>
