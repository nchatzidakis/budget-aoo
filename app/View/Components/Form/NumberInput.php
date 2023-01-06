<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class NumberInput extends Component
{
    public function __construct(
        public $name,
        public $label,
        public $id = null,
        public $placeholder = null,
        public $value = null,
        public $step = 1
    )
    {
    }

    public function render()
    {
        return view('components.form.number-input');
    }
}
