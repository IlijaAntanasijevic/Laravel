<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropDown extends Component
{
    /**
     * Create a new component instance.
     */
    public $options, $name,$id ,$text, $value, $selected,$disabled, $firstOptionValue,$firstOptionText ,$addOtherOption, $selectClass, $parentClass, $label;
    public function __construct($options, $name,$id = null, $text = 'name', $value = 'id', $selected = false, $disabled = false, $firstOptionValue = 0 ,$firstOptionText = null,  $addOtherOption = false, $selectClass = 'selectpicker search-fields', $parentClass = 'form-group', $label = null)
    {
        $this->options = $options;
        $this->name = $name;
        $this->value = $value;
        $this->text = $text;
        $this->id = $id;
        $this->selected = $selected;
        $this->parentClass = $parentClass;
        $this->selectClass = $selectClass;
        $this->firstOptionValue = $firstOptionValue;
        $this->label = $label;

        if($addOtherOption){
            $this->addOtherOption = $addOtherOption;
        }

        if($firstOptionText){
            $this->firstOptionText = $firstOptionText;
        }

        if($disabled){
            $this->disabled = $disabled;
        }

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drop-down');
    }
}
