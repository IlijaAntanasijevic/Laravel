<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextField extends Component
{
    /**
     * Create a new component instance.
     */
    public $type,$label, $id, $error, $name, $placeholder, $parentClass, $fieldClass;
    public function __construct($id, $name, $label = null,$error = null, $placeholder = '' , $parentClass = '', $fieldClass = '',$type = "text")
    {
        $this->type = $type;
        $this->label = $label;
        $this->id = $id;
        $this->error = $error;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->parentClass = $parentClass;
        $this->fieldClass = $fieldClass;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-field');
    }
}
