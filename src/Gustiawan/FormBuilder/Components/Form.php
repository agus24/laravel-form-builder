<?php

namespace Gustiawan\FormBuilder\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public $form;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($form)
    {
        $form->handle();
        $this->form = $form;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('form-generator::components.form');
    }
}
