<?php

namespace Gustiawan\FormBuilder;

class Form
{
    public $action;
    public $method;
    public $fields = [];
    public $button = [
        "label" => "Submit",
        "color" => "bg-blue-400"
    ];

    /**
     * Create Form
     *
     * @param  string $action action of form
     * @param  string $method method of form
     * @return Form
     */
    public function __construct($action, $method) 
    {
        $this->action = $action;
        // need checker for method list
        $this->method = $method;

        return $this;
    }

    public function handle() 
    {
        // 
    }

    /**
     * Create Input Field
     *
     * @param  string $name  name
     * @param  any    $value value
     * @param  string $type  type
     * @return Form
     */
    public function text($name, $label, $value="")
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "text",
            "name" => $name,
            "value" => $value
        ];

        return $this;
    }

    /**
     * Create Password Field
     *
     * @param  string $name  name
     * @param  any    $value value
     * @param  string $type  type
     * @return Form
     */
    public function password($name, $label, $value="") 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "password",
            "name" => $name,
            "value" => $value
        ];

        return $this;
    }

    /**
     * Create Password Field
     *
     * @param  string $name  name
     * @param  any    $value value
     * @param  string $type  type
     * @return Form
     */
    public function date($name, $label, $value="") 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "date",
            "name" => $name,
            "value" => $value
        ];

        return $this;
    }

    /**
     * Create Password Field
     *
     * @param  string $name  name
     * @param  any    $value value
     * @param  string $type  type
     * @return Form
     */
    public function textArea($name, $label, $value="") 
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "textarea",
            "name" => $name,
            "value" => $value
        ];

        return $this;
    }

    /**
     * Create Password Field
     *
     * @param  string $name  name
     * @param  any    $value value
     * @param  string $type  type
     * @return Form
     */
    public function select($name, $label, $choices, $value="")
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "select",
            "name" => $name,
            "value" => $value,
            "choices" => $choices
        ];

        return $this;
    }

    public function radio($name, $label, $choices, $value="")
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "radio",
            "name" => $name,
            "value" => $value,
            "choices" => $choices
        ];

        return $this;
    }

    public function checkBox($name, $label, $choices, array $value=[])
    {
        $this->fields[] = [
            "label" => $label,
            "type" => "checkbox",
            "name" => $name,
            "value" => $value,
            "choices" => $choices
        ];

        return $this;
    }

    public function button($label="Submit", $color="bg-blue-500") 
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
