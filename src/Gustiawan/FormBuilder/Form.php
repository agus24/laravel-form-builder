<?php
namespace Gustiawan\FormBuilder;

/**
 * Base Form Class
 */
class Form
{

    /**
     * Action for form
     *
     * @var string
     */
    public $action;

    /**
     * Method For form.
     *
     * @var string
     */
    public $method;

    /**
     * Form Field List
     *
     * @var array
     */
    public $fields = [];

    /**
     * Form Default value
     *
     * @var array
     */
    public $data = [];

    /**
     * Button Variable
     *
     * @var array
     */
    public $button = [
        "label" => "Submit",
        "color" => null
    ];

    /**
     * Construct the form head with given options
     *
     * @param array $options
     */
    public function __construct(array $options = []) 
    {
        $this->action = $options['action'];
        $this->method = $options['method'];
        $this->data = array_key_exists("data", $options) ? $options['data'] : [];

        $this->button['color'] = config('form_generator.style') == "tailwind" ? "bg-blue-400" : "btn-primary";

        return $this;
    }

    /**
     * Handle form builder
     *
     * @return void
     */
    protected function handle() 
    {
        // 
    }

    /**
     * Form Text input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    protected function text(string $name, string $label, array $options=[])
    {
        $this->fields[] = $this->parseField("text", $name, $label, $options);
    }

    /**
     * Form Password Input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function password(string $name, string $label, array $options=[]) 
    {
        $this->fields[] = $this->parseField("password", $name, $label, $options);
    }

    /**
     * Form Date Input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function date(string $name, string $label, array $options=[]) 
    {
        $this->fields[] = $this->parseField("date", $name, $label, $options);
    }

    /**
     * Form Date Input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function number(string $name, string $label, array $options=[]) 
    {
        $this->fields[] = $this->parseField("number", $name, $label, $options);
    }

    /**
     * Form Text Area Input
     *
     * @param string $name
     * @param string $label
     * @param array $options
     * @return void
     */
    public function textArea(string $name, string $label, array $options=[]) 
    {
        $this->fields[] = $this->parseField("textarea", $name, $label, $options);
    }

    /**
     * Form Select Box Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param array $options
     * @return void
     */
    public function select(string $name, string $label, array $choices, array $options=[])
    {
        $field = $this->parseField("select", $name, $label, $options);
        $field['choices'] = $choices;
        $this->fields[] = $field;
    }

    /**
     * Form Radio Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param array $options
     * @return void
     */
    public function radio(string $name, string $label, array $choices, array $options=[])
    {
        $field = $this->parseField("radio", $name, $label, $options);
        $field['choices'] = $choices;
        $this->fields[] = $field;
    }

    /**
     * Form Checkbox Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param array $option
     * @return void
     */
    public function checkBox(string $name, string $label, array $choices, array $options=[])
    {
        $field = $this->parseField("checkbox", $name, $label, $options, []);
        $field['choices'] = $choices;
        $this->fields[] = $field;
    }

    /**
     * Customizing Form Button
     *
     * @param string $label
     * @param string $color
     * @return void
     */
    public function button(string $label="Submit", string $color="bg-blue-500") 
    {
        $this->button["label"] = $label;
        $this->button["color"] = $color;
    }

    /**
     * check if form need csrf
     *
     * @return boolean
     */
    public function isNeedCsrf() 
    {
        if ($this->method == "GET") {
            return false;
        }
        
        return true;
    }

    /**
     * Parse Field Array
     *
     * @param string $type
     * @param string $name
     * @param string $label
     * @param array $options
     * @param mixed $default_value
     * @return void
     */
    private function parseField(string $type, string $name, string $label, array $options, $default_value=null)
    {
        $field = [
            "label" => $label,
            "type" => $type,
            "name" => $name,
            "required" => array_key_exists("required", $options) ? $options['required'] : false,
            "class" => array_key_exists("class", $options) ? $options['class'] : "",
        ];

        if (array_key_exists("value", $options)) {
            $field['value'] = $options['value'];
        } else {
            $field['value'] = (array_key_exists($name, $this->data) ? $this->data[$name] : $default_value);
        }

        return $field;
    }
}
