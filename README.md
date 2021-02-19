# laravel-form-builder

## requirements
must use `tailwindcss` and `tailwindcss/custom-forms` please install it using your `npm` or `yarn`

## Installation

```gustiawan/laravel-form-builder```

## Usage
create form using

```php artisan make:form {name}```

the file is written in `App/Form`

add your form depends on your need
```
use Gustiawan\FormBuilder\Form;

class ExampleForm extends Form
{
    public function handle() 
    {
        $this->text("textinput", "Text Input");
        $this->password("password", "Old Password");
        $this->textArea("text area", "Text Area", "Default Value");
        $this->date("example_date", "Example Date");
        $this->radio("radio_example", "Radio Example", [1 => "Option one", 2 => "Option two"], 1); // default value
        $this->checkBox("checkbox_example", "Checkbox Example", [1 => "Option one", 2 => "Option two"], [1, 2]); // default value must be array
        $this->select("select_field", "Select Field Example", [1 => "Option one", 2 => "Option two"], 1); // default value
    }
}
```

then inside your controller
```
$form = new ExampleForm(route('example_routes'), "POST");
```

in your view
```
<x-form-generator-form :form="$form" />
```
