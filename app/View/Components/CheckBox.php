<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckBox extends Component
{
    /**
     * Create a new component instance.
     */
    public $name, $value,$text, $error, $options, $fieldClass,$parentClass,$blockClass,$checked;
    public function __construct($name,$options,$value='id',$text='name',$error = null,$fieldClass = 'form-check-input',$parentClass='form-check',$blockClass = '',$checked = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->text = $text;
        $this->error = $error;
        $this->options = $options;
        $this->fieldClass = $fieldClass;
        $this->parentClass = $parentClass;
        $this->blockClass = $blockClass;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.check-box');
    }
}
