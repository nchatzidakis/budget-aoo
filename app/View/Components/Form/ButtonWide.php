<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class ButtonWide extends Component
{
    public function __construct(
        public $route,
        public $color,
        public $value,
    )
    {
    }

    public function render()
    {
        return view('components.form.button-wide');
    }
}
