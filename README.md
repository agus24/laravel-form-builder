# laravel-form-builder


## Installation

`composer require gustiawan/laravel-form-builder`

run this command to publish package

`php artisan vendor:publish --provider="Gustiawan\FormBuilder\FormBuilderServiceProvider"`

## configuration
change style to bootstrap if you want to use bootstrap styling
```php
    /**
     * Set your default styling 
     * the option is [tailwind, bootstrap]
     */
    "style" => "tailwind",
```

change this only if you want to use custom form template
```php
    /**
     * Fill this with your view path
     */
    "form_template" => null
```

## Usage
create form using

```php artisan make:form {name}```

the file is written in `App/Form`

add your form depends on your need
```php
use Gustiawan\FormBuilder\Form;

class ExampleForm extends Form
{
    public function handle() 
    {
        $this->text("textinput", "Text Input");
        $this->password("password", "Old Password");
        $this->textArea("text area", "Text Area", "Default Value");
        $this->date("example_date", "Example Date");
        $this->radio("radio_example", "Radio Example", [1 => "Option one", 2 => "Option two"], ["value" => 1]); // default value
        $this->checkBox("checkbox_example", "Checkbox Example", [1 => "Option one", 2 => "Option two"], ["value" => [1, 2]]); // default value must be array
        $this->select("select_field", "Select Field Example", [1 => "Option one", 2 => "Option two"], ["value" => 1]); // default value
    }
}
```

then inside your controller
```php
public function example() 
{
    $form = new ExampleForm([
        "action" => route('example_routes'),
        "method" => "POST",
        // optional
        "data" => [
            "field_name" => "some value"
        ]
    ]);

    return view('example_view', compact('form'));
}
```

in your view
```php
<x-form-generator-form :form="$form" />
```

### field options
to add default value to the field
```php
$this->text("textinput", "Text Input", ["value" => "some value"]);
```

to make field is required field
```php
$this->text("textinput", "Text Input", ["required" => true]);
```

to make field readonly
```php
$this->text("textinput", "Text Input", ["readonly" => true]);
```

to make field disabled
```php
$this->text("textinput", "Text Input", ["disabled" => true]);
```

to add custom class to the inputs
```php
$this->text("textinput", "Text Input", ["class" => "datetimepicker"]);
```
