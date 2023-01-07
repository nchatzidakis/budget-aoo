<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class DateInput extends Component
{
    public function __construct(
        public $name,
        public $label,
        public $id = null,
        public $value = null)
    {
    }

    public function render()
    {
        return view('components.form.date-input');
    }
}
