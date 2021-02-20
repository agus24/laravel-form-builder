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
        "color" => "bg-blue-400"
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

        return $this;
    }

    /**
     * Handle form builder
     *
     * @return void
     */
    public function handle() 
    {
        // 
    }

    /**
     * Form Text input
     *
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return void
     */
    public function text(string $name, string $label, mixed $value=null)
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "text",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null)
        ];
    }

    /**
     * Form Password Input
     *
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return void
     */
    public function password(string $name, string $label, mixed $value=null) 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "password",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null)
        ];
    }

    /**
     * Form Date Input
     *
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return void
     */
    public function date(string $name, string $label, mixed $value=null) 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "date",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null)
        ];
    }

    /**
     * Form Text Area Input
     *
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return void
     */
    public function textArea(string $name, string $label, mixed $value=null) 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "textarea",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null)
        ];
    }

    /**
     * Form Select Box Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param mixed $value
     * @return void
     */
    public function select(string $name, string $label, array $choices, mixed $value=null)
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "select",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null),
            "choices" => $choices
        ];
    }

    /**
     * Form Radio Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param mixed $value
     * @return void
     */
    public function radio(string $name, string $label, array $choices, mixed $value=null)
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "radio",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : null),
            "choices" => $choices
        ];

        return $this;
    }

    /**
     * Form Checkbox Input
     *
     * @param string $name
     * @param string $label
     * @param array $choices
     * @param array $value
     * @return void
     */
    public function checkBox(string $name, string $label, array $choices, array $value=[])
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "checkbox",
            "name" => $name,
            "value" => $value ?? (array_key_exists($name, $this->data) ? $this->data[$name] : []),
            "choices" => $choices
        ];

        return $this;
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
}
