<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BooleanConvertor extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $value;
    public function __construct($type,$value)
    {
        $this->type=$type;
        $this->value=$value;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.boolean-convertor');
    }
}
