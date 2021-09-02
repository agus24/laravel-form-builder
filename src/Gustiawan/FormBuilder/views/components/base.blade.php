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
        field = document.querySelector(`#${field}`)
        fetch(url).then(response => fetchField(field, response.json())).catch(error => alert(error))
    }

    function fetchField(field, values) {
        field.children.forEach(el => el.remove())
        values.then(data => {
            field.innerText = ''
            let options = []
            for (const value in data) {
                let newOption = document.createElement('option')
                newOption.value = value
                newOption.innerText = data[value]
                options.push(newOption)
            }

            let option = document.createElement('option')
            option.value = ""
            option.innerText = "Select"
            options.unshift(option)

            for (let i = 0; i < options.length; i++) {
                field.appendChild(options[i])
            }
        })
    }
</script>
